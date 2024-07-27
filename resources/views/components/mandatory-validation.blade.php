@extends('layouts.bootstrap')
@props(['for', 'label'])

<label for="{{ $for }}" class="form-label">
    {{ $label }}
    <span class="mandatory-icon text-danger">*</span>
</label>