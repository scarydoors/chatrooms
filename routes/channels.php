<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chatrooms', function() {
    return true;
});
