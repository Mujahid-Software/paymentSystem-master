<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => $this->faker->uuid,
            'customer_name' => $this->faker->name,
            'subscription_plan_id' => SubscriptionPlan::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'payment_method' => $this->faker->randomElement(['Credit Card', 'PayPal', 'Stripe']),
            'period' => $this->faker->randomElement(['Monthly', 'Yearly']),
            'status_id' => $this->faker->randomElement(array_keys(Payment::STATUSES)),
        ];
    }
}
