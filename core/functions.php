<?php

function css($file){
	echo '<link rel="stylesheet" href=" ' . URI . 'views/assets/css/' . $file . '.css' . ' ">';
}

function script($file){
	echo '<script src=" ' . URI . 'views/assets/js/' . $file . '.js' . ' "></script>';
}