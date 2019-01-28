<?php

namespace App\Services;

use App\Code;

class PostTagService{

    private $type;

    public function __construct($type){
        $this->type = ($type == 'POST') ? 'BP_TAG' : 'Q_TAG';
    }

    public function removeTag($tags){

        foreach ($tags as $tag){

            $t = Code::where([
                'key' => $this->type,
                'value' => $tag
            ])->first();
            $t->additional_info = $t->additional_info = (int)$t->additional_info - 1;
            $t->save();
        }
    }

    public function updateTag($tags){

        foreach ($tags as $tag){

            $t = Code::where(['key' => $this->type, 'value' => $tag]);

            if($t->count() > 0){
                $t = $t->first();
                $t->additional_info = (int)$t->additional_info + 1;
            }else{
                $t = new Code;
                $t->key = $this->type;
                $t->value = $tag;
                $t->additional_info = 1;
            }

            $t->save();
        }
    }
}