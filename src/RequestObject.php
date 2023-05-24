<?php
namespace BpjsBridging;

interface RequestObject {
    public function toData();

    public function validate();
}
