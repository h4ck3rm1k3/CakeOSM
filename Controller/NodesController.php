<?php

class NodesController extends AppController {

    var $uses = 'Nodes';

    function texto() {
        $this->layout = "textoopen";

        $this->set('points', $this->Nodes->find('all'));
        $this->pageTitle = "Points";
    }

}