<?php

namespace Database\Seeders;

use App\Models\Promotion;
use App\Models\PromotionCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PercentPromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $percent = rand(0, 90);
        $word = ['ลดแลกแจกแถม ', 'สุดคุ้ม ', 'ลดแรงแซงทุกโปร ', 'โปรโมชันสู้โควิด ',
        'ฉลองง่ายสายตี้ ', 'ก่อนสิ้นปีมีเฮ ', 'ช้อปคุ้ม ', 'HAPPY DEAL ', 'โปรเด็ดส่งท้ายปี ',
        'โปรประจำเดือน '];

        for ($i = 0; $i < 10; $i++) {
            $percent = rand(0, 90);
            $promotion = new Promotion();
            $promotion->name = $word[$i] . $percent . '%';
            $promotion->detail = 'ลด' . $percent . '%';
            $promotion->is_active = (bool)mt_rand(0, 1);
            $promotion->total_amount = rand(0, 20);
            $promotion->discount_type = 'percent';
            $promotion->percent = $percent;
            $promotion->save();

            for ($j = 0; $j < $promotion->total_amount; $j++) {
                $promotionCode = new PromotionCode();
                $promotionCode->code = $promotion->id . fake()->lexify("?????");
                $promotion->promotionCodes()->save($promotionCode);
            }
        }
    }
}
