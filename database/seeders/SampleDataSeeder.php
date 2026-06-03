<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Carbon\Carbon;

class SampleDataSeeder extends Seeder
{
    /**
        * Run the database seeds.
        */
    public function run(): void
    {
        // 1. Create Services
        $services = [
            ['name' => 'Shirt (Men)', 'category' => 'Men\'s Wear', 'price_wash_iron' => 15.00, 'price_iron_only' => 8.00],
            ['name' => 'T-Shirt', 'category' => 'Men\'s Wear', 'price_wash_iron' => 10.00, 'price_iron_only' => 5.00],
            ['name' => 'Trousers/Pants', 'category' => 'Men\'s Wear', 'price_wash_iron' => 18.00, 'price_iron_only' => 10.00],
            ['name' => 'Suit (2 Piece)', 'category' => 'Men\'s Wear', 'price_wash_iron' => 50.00, 'price_iron_only' => 30.00],
            ['name' => 'Dress', 'category' => 'Women\'s Wear', 'price_wash_iron' => 35.00, 'price_iron_only' => 20.00],
            ['name' => 'Blouse', 'category' => 'Women\'s Wear', 'price_wash_iron' => 15.00, 'price_iron_only' => 8.00],
            ['name' => 'Skirt', 'category' => 'Women\'s Wear', 'price_wash_iron' => 18.00, 'price_iron_only' => 10.00],
            ['name' => 'Abaya', 'category' => 'Women\'s Wear', 'price_wash_iron' => 40.00, 'price_iron_only' => 25.00],
            ['name' => 'Bed Sheet (Single)', 'category' => 'Household', 'price_wash_iron' => 25.00, 'price_iron_only' => 15.00],
            ['name' => 'Bed Sheet (Double)', 'category' => 'Household', 'price_wash_iron' => 35.00, 'price_iron_only' => 20.00],
            ['name' => 'Blanket (Heavy)', 'category' => 'Household', 'price_wash_iron' => 60.00, 'price_iron_only' => null],
            ['name' => 'Curtains (Per Meter)', 'category' => 'Household', 'price_wash_iron' => 20.00, 'price_iron_only' => 12.00],
        ];

        foreach ($services as $serviceData) {
            Service::create(array_merge($serviceData, [
                'is_active' => true,
                'description' => 'Premium ' . strtolower($serviceData['name']) . ' laundry service',
            ]));
        }
        $createdServices = Service::all();

        // 2. Create Customers
        $customers = [
            ['name' => 'Ahmad Hassan', 'phone' => '33445566', 'address' => 'Doha, West Bay'],
            ['name' => 'Fatima Ali', 'phone' => '66778899', 'address' => 'Al Wakrah'],
            ['name' => 'John Smith', 'phone' => '55667788', 'address' => 'The Pearl, Qatar'],
            ['name' => 'Sara Ahmed', 'phone' => '77889900', 'address' => 'Al Sadd'],
            ['name' => 'Mohammed Khalid', 'phone' => '33221100', 'address' => 'Abu Hamour'],
        ];

        foreach ($customers as $customerData) {
            Customer::create(array_merge($customerData, [
                'is_active' => true,
                'total_orders' => rand(1, 10),
            ]));
        }
        $createdCustomers = Customer::all();

        // 3. Create Orders & Order Items
        $statuses = ['pending', 'processing', 'ready', 'delivered'];
        
        foreach ($createdCustomers as $customer) {
            // Create 1-3 orders for each customer
            $numOrders = rand(1, 3);
            for ($i = 0; $i < $numOrders; $i++) {
                $status = $statuses[array_rand($statuses)];
                $isDelivered = $status === 'delivered';
                
                $order = Order::create([
                    'customer_id' => $customer->id,
                    'order_number' => Order::generateOrderNumber(),
                    'total_amount' => 0, // Will update later
                    'discount' => 0,
                    'tax' => 0,
                    'advance_payment' => 0,
                    'status' => $status,
                    'payment_status' => 'pending',
                    'delivery_date' => Carbon::now()->addDays(rand(1, 4)),
                    'delivered_at' => $isDelivered ? Carbon::now()->subHours(rand(1, 24)) : null,
                ]);

                // Create items for order
                $numItems = rand(1, 4);
                $totalAmount = 0;
                
                for ($j = 0; $j < $numItems; $j++) {
                    $service = $createdServices->random();
                    $quantity = rand(1, 5);
                    $serviceType = (rand(0, 1) === 1 && $service->price_iron_only) ? 'iron_only' : 'wash_iron';
                    
                    // Determine price based on service type
                    $unitPrice = $serviceType === 'iron_only' ? $service->price_iron_only : $service->price_wash_iron;
                    
                    if (!$unitPrice) {
                        $unitPrice = $service->price_wash_iron;
                        $serviceType = 'wash_iron';
                    }
                    
                    $subtotal = $unitPrice * $quantity;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'service_id' => $service->id,
                        'quantity' => $quantity,
                        'service_type' => $serviceType,
                        'finish_type' => rand(0, 1) ? 'hanger' : 'fold',
                        'unit_price' => $unitPrice,
                        'subtotal' => $subtotal,
                        'notes' => rand(0, 1) ? 'Handle with care' : null,
                    ]);
                    
                    $totalAmount += $subtotal;
                }

                // Update order total
                $order->total_amount = $totalAmount;
                
                // Determine payments
                if ($isDelivered || rand(0, 1)) {
                    $order->payment_status = 'paid';
                    $order->advance_payment = $totalAmount;
                    
                    Payment::create([
                        'order_id' => $order->id,
                        'amount' => $totalAmount,
                        'payment_method' => rand(0, 1) ? 'cash' : 'card',
                        'payment_date' => Carbon::now(),
                        'created_by' => 1,
                        'notes' => 'Paid in full',
                    ]);
                } else {
                    if (rand(0, 1)) {
                        $advance = round($totalAmount / 2, 2);
                        $order->advance_payment = $advance;
                        $order->payment_status = 'partial';
                        
                        Payment::create([
                            'order_id' => $order->id,
                            'amount' => $advance,
                            'payment_method' => 'cash',
                            'payment_date' => Carbon::now(),
                            'created_by' => 1,
                            'notes' => 'Advance payment',
                        ]);
                    }
                }
                
                $order->save();
            }
        }
    }
}
