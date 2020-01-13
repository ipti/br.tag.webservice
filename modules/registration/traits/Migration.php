<?php

namespace app\modules\registration\traits;

trait Migration
{

    public function run(){
        $batchSize = 200;
        $quantity = $this->count();
        $interations = ceil($quantity / $batchSize);
        $actualInteration = 0;

        while ($actualInteration < $interations) {

            $data = $this->find($batchSize, $actualInteration);

            foreach ($data as $item) {
                $this->loadModel((object) $item);
                $instance = $this->factory();
                $type = get_class($instance);
                $pos = strrpos($type, '\\') + 1;
                $type = substr($type, $pos);
                $dataModel = [$type => $this->getAttributes()];
                $instance->load($dataModel);
                $instance->save(false);

            }
            ++$actualInteration;
        }

        return $quantity;
    }

}