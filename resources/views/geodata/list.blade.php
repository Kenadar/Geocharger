@extends('geodata')

@section('list')
 
 <?php $geodataList = Geodata::table('geodata')->lists('id', 'latitude', 'longitude')->get(); ?>
 

@section