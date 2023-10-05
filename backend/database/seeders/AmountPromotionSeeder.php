<?php

namespace Database\Seeders;

use App\Models\Promotion;
use App\Models\PromotionCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmountPromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $word = ['อิ่มด้วยพอยท์ ', 'โปรโมชันท้าแดด ', 'ให้แล้วให้อีก ', 'ระเบิดราคา '
        , 'เติมเต็มความสดชื่น ', 'ถูกใจสายช้อป ', 'มีนา มีโปร ', 'โปรแฟลช ',
        'SUPER FLASH ', 'ลดจุใจทั้งเดือน '];

        for ($i = 0; $i < 10; $i++) {
            $amount = rand(1000, 100000);
            $promotion = new Promotion();
            $promotion->name = $word[$i] . $amount .' บาท';
            $promotion->detail = 'ลด' . $amount .' บาท';
            $promotion->is_active = (bool)mt_rand(0, 1);
            $promotion->total_amount = rand(0, 20);
            $promotion->discount_type = 'amount';
            $promotion->amount = $amount;
            $promotion->save();

            for ($j = 0; $j < $promotion->total_amount; $j++) {
                $promotionCode = new PromotionCode();
                $promotionCode->code = $promotion->id . fake()->lexify("?????");
                $promotion->promotionCodes()->save($promotionCode);
            }
        }
    }
}
