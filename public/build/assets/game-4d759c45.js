const l=document.getElementById("game")?document.getElementById("game").dataset.length:0,g=document.getElementById("game")?document.getElementById("game").dataset.attempts:0,_=document.getElementById("game")?document.getElementById("game").dataset.id:0,f=document.getElementById("password_view"),o=document.getElementById("private_lobby"),y=document.getElementById("copy_game");let s="";const w=function(n,a=null){let e=new XMLHttpRequest;return e.open("POST",n,!1),e.setRequestHeader("Content-Type","application/json;charset=UTF-8"),e.withCredentials=!0,e.send(JSON.stringify(a)),e.status==200?JSON.parse(e.responseText):!1};if(g)for(let n=0;n<g;n++)for(let a=0;a<l;a++){let e=n*l+a+1;document.getElementById("letter-"+e).onkeyup=h=>{let r=String.fromCharCode(h.keyCode),c=document.getElementById("letter-"+e),p=document.getElementById("letter-"+(e+1)),i=document.getElementById("letter-"+(e-1));if(r.match(/^[a-zA-Z]*$/)){if(p&&p.focus(),s+=r,e%l===0||e===l*g){let d=w("/game/check",{id:_,word:s});if(s="",d.data.status==="ok"){let m=0;for(let u=Math.floor((e-1)/l)*l+1;u<=e;u++){let t=document.getElementById("letter-"+u);d.data.letter[m]===2?(t.classList.remove("text-light"),t.classList.add("text-success")):d.data.letter[m]===1?(t.classList.remove("text-light"),t.classList.add("text-warning")):(t.classList.remove("text-light"),t.classList.add("text-white-50")),m++,t.disabled=!0}}else(d.data.status==="win"||d.data.status==="lose")&&location.reload()}c.value=r}else h.keyCode===8?(s=s.substring(0,s.length-1),i?(i.focus(),i.value=""):c.value=""):c.value=""}}o&&o.checked&&f.classList.remove("d-none");o&&(o.onchange=()=>{o.checked?f.classList.remove("d-none"):f.classList.add("d-none")});y&&(y.onclick=()=>{navigator.clipboard.writeText(y.dataset.link).then(()=>{})});