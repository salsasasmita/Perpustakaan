var keyword = document.getElementById('keyword');
var temukan = document.getElementById('temukan');
var caribuku = document.getElementById('caribuku');

keyword.addEventListener('keyup', function() {
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200){
			caribuku.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET', 'daftarbuku.php?keyword='+keyword.value, true);

	xhr.send();
});