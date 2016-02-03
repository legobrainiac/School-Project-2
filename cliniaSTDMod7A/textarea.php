<?php include('connection.php'); ?>

<script type="text/javascript">
	function loadIframe() {
		frm.document.designMode = 'On';
		return false;
	}

	function formatText(btn) {
		if(btn == 'b')
			frm.document.execCommand('bold', false, null);
	 	else if(btn == 'i')
			frm.document.execCommand('italic', false, null);
		else if(btn == 'u')
			frm.document.execCommand('underline', false, null);
		else if(btn == 's')
			frm.document.execCommand('FontSize', false, prompt("Size: "));
		else if(btn == 'c')
			frm.document.execCommand('ForeColor', false, prompt('Color: '));
		else if(btn == 'hr')
			frm.document.execCommand('inserthorizontalrule',false, null);
		else if(btn == 'ul')
			frm.document.execCommand('InsertUnorderedList',false, null);
		else if(btn == 'ol')
			frm.document.execCommand('InsertOrderedList',false, null);
		else if(btn == 'link')
			frm.document.execCommand('CreateLink',false, prompt("Link: "));
		else if(btn == 'unlink')
			frm.document.execCommand('Unink',false, null);
		else if(btn == 'image') {
			var imgSrc = prompt("Source: ");
			if(imgSrc != null) {
				frm.document.execCommand('insertimage',false, imgSrc);
			}
		}
	}

	function Submit () {
		var form = document.getElementById('form');
		form.elements["txtMessage"].value = window.frames['frm'].document.body.innerHTML;
		alert('done');
	}
</script>

<style type="text/css">
	form#form {
		width: 500px;
	}

	iframe {
		width: 500px;
		padding: 10px;
		padding-top: 80px;
		margin-top: -80px;
	}

	div#buttons {
		background-color: #999999;
		width: 100%;
		padding: 10px;
	}
</style>

<body onload="loadIframe()">
	<form id="form" method="POST" action="">
		<div id="buttons">
			<input type="button" onclick="formatText('b')" value="B">
			<input type="button" onclick="formatText('i')" value="I">
			<input type="button" onclick="formatText('u')" value="U">
			<input type="button" onclick="formatText('s')" value="Size">
			<input type="button" onclick="formatText('c')" value="Color">
			<input type="color">
			<input type="button" onclick="formatText('hr')" value="HR">
			<input type="button" onclick="formatText('ul')" value="UL">
			<input type="button" onclick="formatText('ol')" value="OL">
			<input type="button" onclick="formatText('link')" value="Link">
			<input type="button" onclick="formatText('unlink')" value="UnLink">
			<input type="button" onclick="formatText('image')" value="Image">
		</div>
		<br/><br/>
		<textarea name="txtMessage" id="comment" cols="60" rows="10" style="display: none;" id="txtMessage"></textarea>
		<iframe name="frm" id="frm" style="font-size: 12pt;" cols="60" rows="10"></iframe>
		<br /><br /><input type="submit" onclick="Submit()" value="Submit" name="submit">
	</form>
</body>

<?php
	if(isset($_POST["submit"])) {
		echo "cenas";
		echo "<script>alert('php')</script>";
		$cenas = $_POST["txtMessage"];
		echo "$cenas";

		$query = $mysqli->query("INSERT INTO teste (titulo, conteudo) VALUES ('Titulo1', '$cenas')");
		if($query) {
			echo "<script> alert('Post successful!'); location.href='panel.php' </script>";
		} else {
			echo "<script> alert('Erro ao adicionar post!'); </script>";
		}
	}
?>