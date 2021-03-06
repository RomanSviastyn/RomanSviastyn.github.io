var TINY={};

function T$(i){return document.getElementById(i)}
function T$$(e,p){return p.getElementsByTagName(e)}

TINY.table=function(){
	function sorter(n,amount){this.n=n; this.pagesize=amount; this.paginate=0}
	sorter.prototype.init=function(e,f){
		var t=ge(e), i=0; this.e=e; this.l=t.r.length; t.a=[];
		t.h=T$$('thead',T$(e))[0].rows[0]; t.w=t.h.cells.length;
		for(i;i<t.w;i++)
		{
			var c=t.h.cells[i];
			if(c.className!='nosort')
			{
				c.className=this.head;
				c.onclick=new Function(this.n+'.wk(this.cellIndex)')
			}
		}
		for(i=0;i<this.l;i++){t.a[i]={}}
		if(f!=null){var a=new Function(this.n+'.wk('+f+')'); a()}
		if(this.paginate){this.g=1; this.pages(); this.createPageList();}
		this.SetActivePage(2); //0-<<|1-<|2-1
	};
	sorter.prototype.wk=function(y){
		var t=ge(this.e), x=t.h.cells[y], i=0;
		for(i;i<this.l;i++)
		{
			t.a[i].o=i; var v=t.r[i].cells[y]; t.r[i].style.display='';
			while(v.hasChildNodes()){v=v.firstChild}
			t.a[i].v=v.nodeValue?v.nodeValue:''
		}
		for(i=0;i<t.w;i++){var c=t.h.cells[i]; if(c.className!='nosort'){c.className=this.head}}
		if(t.p==y){t.a.reverse(); x.className=t.d?this.asc:this.desc; t.d=t.d?0:1}
		else{t.p=y; t.a.sort(cp); t.d=0; x.className=this.asc}
		var n=document.createElement('tbody');
		for(i=0;i<this.l;i++)
		{
			var r=t.r[t.a[i].o].cloneNode(true); n.appendChild(r);
			r.className=i%2==0?this.even:this.odd;
			var cells=T$$('td',r);
			for(var z=0;z<t.w;z++){cells[z].className=y==z?i%2==0?this.evensel:this.oddsel:''}
		}
		t.replaceChild(n,t.b); if(this.paginate){this.size(this.pagesize)}
		this.SetActivePage(2);
	};
	sorter.prototype.page=function(s){
		var t=ge(this.e), i=0, l=s+parseInt(this.pagesize);
		for(i;i<this.l;i++){t.r[i].style.display=i>=s&&i<l?'':'none'}
	};
	sorter.prototype.move=function(d){
		var s, temp = parseInt(d);
		if(isNaN(temp))
		{
			switch(d)
			{
				case '<<':s = 1;break;
				case '<':s = this.g - 1;break;
				case '>':s = this.g + 1;break;
				case '>>':s = this.d;break;
				default:s = 1;break;
			}
		}
		else
		{
			s = temp;
		}
		if(s>this.d||s<=0) s = 1;
		this.g=s;
		this.page((s-1)*this.pagesize);
		this.SetActivePage(s+1);
	};
	sorter.prototype.size=function(s){
		this.pagesize=s; this.g=1; this.pages(); this.page(0);
	};
	sorter.prototype.pages=function(){this.d=Math.ceil(this.l/this.pagesize)};
	sorter.prototype.createPageList=function(){
		var text = "<ul><li><a onclick='sorter.move(this.text)'><<</a></li><li><a onclick='sorter.move(this.text)'><</a></li>";
		for(var i = 1; i <= this.d; i++)
			text += "<li><a onclick='sorter.move(this.text)'>"+i+"</a></li>";
		text += "<li><a onclick='sorter.move(this.text)'>></a></li><li><a onclick='sorter.move(this.text)'>>></a></ul>";
		T$('pagination').innerHTML += text;
	};
	sorter.prototype.SetActivePage=function(page){
		var pagination = document.querySelector("#pagination");
		var arr = pagination.querySelectorAll("li");
		for(var i = 0; i < arr.length; i++)
			if(i==page)
				arr[page].className = "active";
			else
				arr[i].className = "";
	};
	function ge(e){var t=T$(e); t.b=T$$('tbody',t)[0]; t.r=t.b.rows; return t};
	function cp(f,c){
		var g,h; f=g=f.v.toLowerCase(), c=h=c.v.toLowerCase();
		var i=parseFloat(f.replace(/(\$|\,)/g,'')), n=parseFloat(c.replace(/(\$|\,)/g,''));
		if(!isNaN(i)&&!isNaN(n)){g=i,h=n}
		i=Date.parse(f); n=Date.parse(c);
		if(!isNaN(i)&&!isNaN(n)){g=i; h=n}
		return g>h?1:(g<h?-1:0)
	};
	return{sorter:sorter}
}();