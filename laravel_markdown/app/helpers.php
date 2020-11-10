<?php

    function Hello() {
        return 'Hello';
    }

    function mark_down($text) {
        return app(ParsedownExtra::class)->text($text);
    }
?>