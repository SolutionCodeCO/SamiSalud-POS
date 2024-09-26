<?php

interface IModel{
    public function save();
    public function getAll();
    public function get($id);
    public function getProductById($id);
    public function getProductInfoById($id);
    public function delete($id);
    public function update();
    public function from($array);

}