

var readyStateCheckInterval = setInterval(function() {
	
	if(document.readyState === "complete") {
		
		clearInterval(readyStateCheckInterval);
		
		var els = document.querySelectorAll('a');
		
		for(i=0 ; i< els.length ; i++){
			els[i].addEventListener("click", orderForm, false);
		}
		
		document.querySelector('a.close').addEventListener("click", closeForm, false);
	};
	
	var content = document.querySelector('#content');
	
	var p = new Packery(content,{
		columnWidth:1,

		itemSelector:'.a',
		rowHeight:1
	});
	
}, 10);
	
function orderForm(e) {
	
	e.preventDefault();
	var html = document.querySelector('html');
	console.log(e);
	
	if(e.target.id !== "undefined")
	{
		document.getElementById('id').value = e.target.id;
	}
	else
	{
		document.getElementById('id').value = e.target[0].id;
	}
	
	html.classList.add('order');

}

function closeForm(e) {
	
	e.preventDefault();
	var html = document.querySelector('html');
	html.classList.remove('order');

}
