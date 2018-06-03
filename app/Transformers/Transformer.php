<?php

namespace App\Transformers;

abstract class Transformer
{
    /**
     * All child classes should declare the schema for their resources
     * @param $item
     * @return array
     */
    public abstract function schema($item);


    /**
     * Single transforming using the resource schema
     * @param $item
     * @return array
     */
    public function transform($item)
    {
        $item = is_array($item) ? $item : $item->toArray();
        return $this->schema($item);
    }
    
}