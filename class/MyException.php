<?php
class MyException extends Exception { }

class Test {
	public function testing($string) {
		try {
			try {
				throw new MyException($string);
			} catch (MyException $e) {
				// rethrow it
				throw $e;
			}
		} catch (Exception $e) {
			//var_dump($e->getMessage());
		}
	}
}