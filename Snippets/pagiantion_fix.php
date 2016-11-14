<?php

//this
$limitstart = $app->getUserStateFromRequest('limitstart', 'limitstart', 0);

// to this
$limitstart = JRequest::getVar('limitstart', 0, '', 'int');
