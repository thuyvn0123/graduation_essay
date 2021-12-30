<?php

namespace App\Botman;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use App\Models\Botchat;

class OnboardingConversation extends Conversation
{
    protected $name;

    protected $phone;

    protected $room;

    public function run(){
        // This will be called immediately
        $this->askName();
    }

    private function askName(){
        $this->ask('Xin Chào!, Bạn tên gì?', function(Answer $answer) {

            $name = $answer->getText();

            $this->say('Hi '.$name);
            $help = Question::create('Bạn cần hỗ trợ gì?')
            ->addButtons([
                Button::create('Tôi muốn mua sản phẩm nội thất!')->value('buy'),
                Button::create('Tôi muốn trang trí ngôi nhà!')->value('design'),
                Button::create('Tôi không cần gì cả!')->value('no'),
            ]);
            $this->name=$name;

            $this->ask($help, function (Answer $answer) {
                if ($answer->isInteractiveMessageReply()) {
                    $selectedValue = $answer->getValue();
                    $selectedText = $answer->getText();
                    if($selectedValue == 'buy'){
                        $this->say('Bạn có thể đặt hàng trên shop hoặc đến showroom để xem chi tiết sản phẩm');
                    }
                    if($selectedValue == 'design'){
                        $design = Question::create('Căn phòng bạn cần trang trí')
                            ->addButtons([
                                Button::create('Phòng Khách')->value('phongkhach'),
                                Button::create('Phòng Ngủ')->value('phongngu'),
                                Button::create('Tủ Bếp')->value('tubep'),
                                Button::create('Phòng Làm Việc')->value('phonglamviec'),
                                Button::create('Phòng Ăn')->value('phongan'),

                            ]);
                        $this->ask($design , function (Answer $answer) {
                            if ($answer->isInteractiveMessageReply()) {
                                $designValue = $answer->getValue();
                                $designText = $answer->getText();
                                $this->room=$designText;
                                $phone = Question::create('Bạn có sẵn sàng cung cấp số điện thoại không')
                                ->addButtons([
                                    Button::create('Có')->value('yes'),
                                    Button::create('Không')->value('no'),
                                ]);
                                $this->ask($phone , function (Answer $answer) {
                                    if ($answer->isInteractiveMessageReply()) {
                                        $slphone = $answer->getValue();
                                        if($slphone == 'no'){
                                            $this->say('Cảm ơn bạn đã quan tâm đến dịch vụ của chúng tôi');
                                        }
                                        if($slphone == 'yes'){
                                            $this->ask('Số điện thoại của bạn là?' , function (Answer $answer) {
                                                $phone = $answer->getText();
                                                $this->phone=$phone;
                                                $this->say('Quy trình thiết kế:<br>
                                                Bước 1: Tiếp nhận thông tin và khảo sát<br>
                                                Bước 2: Thiết kế ý tưởng<br>
                                                Bước 3: Thiết kế phối cảnh 3D<br>
                                                Bước 4: Ký hợp đồng thi công<br>
                                                Bước 5: Triển khai thi công<br>
                                                Bước 6: Nghiệm thu bàn giao');
                                                $this->say('Chúng tôi sẽ liên hệ cho bạn để cung cấp thông tin chi tiết');
                                                $this->say('Chúc bạn nhiều sức khỏe!');
                                                $this->exit();
                                            });

                                        }

                                    }
                                });

                            }
                        });

                    }
                }
            });
        });
    }

    private function exit() {
        $data = [
            'bot_name' =>$this->name,
            'bot_room' =>$this->room,
            'bot_phone' =>$this->phone,
        ];
        Botchat::create($data);
        return true;
    }
}
