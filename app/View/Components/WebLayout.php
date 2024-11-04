<?php
namespace App\View\Components;
use Illuminate\View\Component;
use Illuminate\View\View;
class WebLayout extends Component{
    public function render(){
        return view('layouts.web-layout');
    }
}
