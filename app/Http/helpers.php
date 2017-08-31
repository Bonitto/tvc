<?php

function getProperty($prop, $list) {
	foreach ($list as $item) {
		if (strtolower($item->name) == strtolower($prop)) {
			return $item->value;
		}
	}
}