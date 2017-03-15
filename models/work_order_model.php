<?php

	function simpan_warna($simpan){
		mysql_query("insert into color values(".$simpan.")");
	}
	function simpan_merk($simpan){
		mysql_query("insert into color values(".$simpan.")");
	}

?>