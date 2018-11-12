<?php

namespace app\modules\migration\traits;

trait Import
{

    public function import(){
        $batchSize = 200;
        $quantity = $this->count();
        $interations = ceil($quantity / $batchSize);
        $actualInteration = 0;

        while ($actualInteration < $interations) {

            $data = $this->find($batchSize, $actualInteration);

            foreach ($data as $item) {
                $this->load((object) $item);
                $instance = $this->factory();
                $instance->load($this->getAttributes());
                $instance->save();

            }
            ++$actualInteration;
        }

        return $quantity;
    }

}