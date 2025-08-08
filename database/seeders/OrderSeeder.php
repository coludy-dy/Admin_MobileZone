<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $adminIds = Admin::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();

        if (empty($userIds) || empty($adminIds) || empty($productIds)) {
            $this->command->warn('Users/Admins/Products missing. Please seed them first.');
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            $status = fake()->randomElement(['pending', 'complete']);
            $completeDate = $status === 'complete' ? Carbon::now()->subDays(rand(1, 10)) : null;

            $order = Order::create([
                'user_id' => fake()->randomElement($userIds),
                'admin_id' => fake()->randomElement($adminIds),
                'total_amount' => fake()->randomNumber(),
                'status' => $status,
                'complete_date' => $completeDate,
            ]);

            $total = 0;
            $itemsCount = rand(1, 5);

            for ($j = 0; $j < $itemsCount; $j++) {
                $productId = fake()->randomElement($productIds);
                $product = Product::find($productId);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                ]);

                $total += $product->price ?? 0;
            }

            $order->update(['total_amount' => $total]);
        }
    }
}
