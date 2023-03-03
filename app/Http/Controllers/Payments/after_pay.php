<?php
    if ($model) {
        $model->status = $transaction->status;
        $model->save();
    }
