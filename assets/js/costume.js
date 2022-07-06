// sidebar open
$("a.openSidebar").click(function(){
	const openSidebar = this;

	$("ul.sidebar").fadeToggle();

	if(openSidebar.classList.contains("animasiX")) {
		openSidebar.classList.remove("animasiX");

	} else {
		openSidebar.classList.add("animasiX");
	}
})

// show child td
const tbody = document.querySelector('table.table tbody');
if(tbody != null) {
	tbody.addEventListener('click',function(e){
		if(e.target.classList.contains('btn-child') === true) {

			if(tbody.querySelector("tr#"+e.target.getAttribute('id-data')) == null) {
				const ul = document.createElement('ul');
				const li1 = document.createElement('li');
				const li2 = document.createElement('li');
				const tr = document.createElement('tr');
				const td = document.createElement('td');
				const text = document.createTextNode(e.target.getAttribute('data'));
				const keterangan = document.createTextNode(e.target.getAttribute('key-data'));

				li1.classList.add('key-data');
				li1.appendChild(keterangan);
				li2.appendChild(text);
				ul.appendChild(li1);
				ul.appendChild(li2);

				console.log(ul);

				td.setAttribute('colspan','5');
				td.appendChild(ul);
				tr.id = e.target.getAttribute('id-data');
				tr.appendChild(td);

				const trLoc = e.target.parentElement.parentElement.nextElementSibling;
				tbody.insertBefore(tr,trLoc);
				e.target.classList.replace('glyphicon-plus-sign','glyphicon-minus-sign');
				e.target.classList.replace('green','red');

			} else {
				tbody.removeChild(tbody.querySelector("tr#"+e.target.getAttribute('id-data')));
				e.target.classList.replace('glyphicon-minus-sign','glyphicon-plus-sign');
				e.target.classList.replace('red','green');
			}

		}
	});
}