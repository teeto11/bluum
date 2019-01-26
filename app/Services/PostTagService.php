<?php

namespace App\Services;

use App\Code;

class PostTagService{

    public function removeTag($tags){

        foreach ($tags as $tag){

            $t = Code::where([
                'key' => 'BP_TAG',
                'value' => $tag
            ])->first();
            $t->additional_info = $t->additional_info = (int)$t->additional_info - 1;
            $t->save();
        }
    }

    public function updateTag($tags){

        foreach ($tags as $tag){

            $t = Code::where(['key' => 'BP_TAG', 'value' => $tag]);

            if($t->count() > 0){
                $t = $t->first();
                $t->additional_info = (int)$t->additional_info + 1;
            }else{
                $t = new Code;
                $t->key = 'BP_TAG';
                $t->value = $tag;
                $t->additional_info = 1;
            }

            $t->save();
        }
    }
}