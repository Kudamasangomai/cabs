/*!
 * FilePondPluginImagePreview 4.6.12
 * Licensed under MIT, https://opensource.org/licenses/MIT/
 * Please visit https://pqina.nl/filepond/ for details.
 */const ce=e=>/^image/.test(e.type),j=(e,t)=>N(e.x*t,e.y*t),K=(e,t)=>N(e.x+t.x,e.y+t.y),oe=e=>{const t=Math.sqrt(e.x*e.x+e.y*e.y);return t===0?{x:0,y:0}:N(e.x/t,e.y/t)},U=(e,t,i)=>{const a=Math.cos(t),s=Math.sin(t),c=N(e.x-i.x,e.y-i.y);return N(i.x+a*c.x-s*c.y,i.y+s*c.x+a*c.y)},N=(e=0,t=0)=>({x:e,y:t}),v=(e,t,i=1,a)=>{if(typeof e=="string")return parseFloat(e)*i;if(typeof e=="number")return e*(a?t[a]:Math.min(t.width,t.height))},le=(e,t,i)=>{const a=e.borderStyle||e.lineStyle||"solid",s=e.backgroundColor||e.fontColor||"transparent",c=e.borderColor||e.lineColor||"transparent",o=v(e.borderWidth||e.lineWidth,t,i),h=e.lineCap||"round",l=e.lineJoin||"round",m=typeof a=="string"?"":a.map(f=>v(f,t,i)).join(","),p=e.opacity||1;return{"stroke-linecap":h,"stroke-linejoin":l,"stroke-width":o||0,"stroke-dasharray":m,stroke:c,fill:s,opacity:p}},G=e=>e!=null,he=(e,t,i=1)=>{let a=v(e.x,t,i,"width")||v(e.left,t,i,"width"),s=v(e.y,t,i,"height")||v(e.top,t,i,"height"),c=v(e.width,t,i,"width"),o=v(e.height,t,i,"height"),h=v(e.right,t,i,"width"),l=v(e.bottom,t,i,"height");return G(s)||(G(o)&&G(l)?s=t.height-o-l:s=l),G(a)||(G(c)&&G(h)?a=t.width-c-h:a=h),G(c)||(G(a)&&G(h)?c=t.width-a-h:c=0),G(o)||(G(s)&&G(l)?o=t.height-s-l:o=0),{x:a||0,y:s||0,width:c||0,height:o||0}},de=e=>e.map((t,i)=>`${i===0?"M":"L"} ${t.x} ${t.y}`).join(" "),S=(e,t)=>Object.keys(t).forEach(i=>e.setAttribute(i,t[i])),ge="http://www.w3.org/2000/svg",W=(e,t)=>{const i=document.createElementNS(ge,e);return t&&S(i,t),i},fe=e=>S(e,{...e.rect,...e.styles}),ue=e=>{const t=e.rect.x+e.rect.width*.5,i=e.rect.y+e.rect.height*.5,a=e.rect.width*.5,s=e.rect.height*.5;return S(e,{cx:t,cy:i,rx:a,ry:s,...e.styles})},me={contain:"xMidYMid meet",cover:"xMidYMid slice"},pe=(e,t)=>{S(e,{...e.rect,...e.styles,preserveAspectRatio:me[t.fit]||"none"})},we={left:"start",center:"middle",right:"end"},Ee=(e,t,i,a)=>{const s=v(t.fontSize,i,a),c=t.fontFamily||"sans-serif",o=t.fontWeight||"normal",h=we[t.textAlign]||"start";S(e,{...e.rect,...e.styles,"stroke-width":0,"font-weight":o,"font-size":s,"font-family":c,"text-anchor":h}),e.text!==t.text&&(e.text=t.text,e.textContent=t.text.length?t.text:" ")},ye=(e,t,i,a)=>{S(e,{...e.rect,...e.styles,fill:"none"});const s=e.childNodes[0],c=e.childNodes[1],o=e.childNodes[2],h=e.rect,l={x:e.rect.x+e.rect.width,y:e.rect.y+e.rect.height};if(S(s,{x1:h.x,y1:h.y,x2:l.x,y2:l.y}),!t.lineDecoration)return;c.style.display="none",o.style.display="none";const m=oe({x:l.x-h.x,y:l.y-h.y}),p=v(.05,i,a);if(t.lineDecoration.indexOf("arrow-begin")!==-1){const f=j(m,p),_=K(h,f),E=U(h,2,_),w=U(h,-2,_);S(c,{style:"display:block;",d:`M${E.x},${E.y} L${h.x},${h.y} L${w.x},${w.y}`})}if(t.lineDecoration.indexOf("arrow-end")!==-1){const f=j(m,-p),_=K(l,f),E=U(l,2,_),w=U(l,-2,_);S(o,{style:"display:block;",d:`M${E.x},${E.y} L${l.x},${l.y} L${w.x},${w.y}`})}},Ie=(e,t,i,a)=>{S(e,{...e.styles,fill:"none",d:de(t.points.map(s=>({x:v(s.x,i,a,"width"),y:v(s.y,i,a,"height")})))})},q=e=>t=>W(e,{id:t.id}),_e=e=>{const t=W("image",{id:e.id,"stroke-linecap":"round","stroke-linejoin":"round",opacity:"0"});return t.onload=()=>{t.setAttribute("opacity",e.opacity||1)},t.setAttributeNS("http://www.w3.org/1999/xlink","xlink:href",e.src),t},Me=e=>{const t=W("g",{id:e.id,"stroke-linecap":"round","stroke-linejoin":"round"}),i=W("line");t.appendChild(i);const a=W("path");t.appendChild(a);const s=W("path");return t.appendChild(s),t},xe={image:_e,rect:q("rect"),ellipse:q("ellipse"),text:q("text"),path:q("path"),line:Me},Te={rect:fe,ellipse:ue,image:pe,text:Ee,path:Ie,line:ye},Ae=(e,t)=>xe[e](t),Re=(e,t,i,a,s)=>{t!=="path"&&(e.rect=he(i,a,s)),e.styles=le(i,a,s),Te[t](e,i,a,s)},Ce=["x","y","left","top","right","bottom","width","height"],ve=e=>typeof e=="string"&&/%/.test(e)?parseFloat(e)/100:e,Pe=e=>{const[t,i]=e,a=i.points?{}:Ce.reduce((s,c)=>(s[c]=ve(i[c]),s),{});return[t,{zIndex:0,...i,...a}]},Ve=(e,t)=>e[1].zIndex>t[1].zIndex?1:e[1].zIndex<t[1].zIndex?-1:0,Ge=e=>e.utils.createView({name:"image-preview-markup",tag:"svg",ignoreRect:!0,mixins:{apis:["width","height","crop","markup","resize","dirty"]},write:({root:t,props:i})=>{if(!i.dirty)return;const{crop:a,resize:s,markup:c}=i,o=i.width,h=i.height;let l=a.width,m=a.height;if(s){const{size:E}=s;let w=E&&E.width,T=E&&E.height;const d=s.mode,M=s.upscale;w&&!T&&(T=w),T&&!w&&(w=T);const n=l<w&&m<T;if(!n||n&&M){let r=w/l,g=T/m;if(d==="force")l=w,m=T;else{let u;d==="cover"?u=Math.max(r,g):d==="contain"&&(u=Math.min(r,g)),l=l*u,m=m*u}}}const p={width:o,height:h};t.element.setAttribute("width",p.width),t.element.setAttribute("height",p.height);const f=Math.min(o/l,h/m);t.element.innerHTML="";const _=t.query("GET_IMAGE_PREVIEW_MARKUP_FILTER");c.filter(_).map(Pe).sort(Ve).forEach(E=>{const[w,T]=E,d=Ae(w,T);Re(d,w,T,p,f),t.element.appendChild(d)})}}),H=(e,t)=>({x:e,y:t}),De=(e,t)=>e.x*t.x+e.y*t.y,J=(e,t)=>H(e.x-t.x,e.y-t.y),Se=(e,t)=>De(J(e,t),J(e,t)),Q=(e,t)=>Math.sqrt(Se(e,t)),ee=(e,t)=>{const i=e,a=1.5707963267948966,s=t,c=1.5707963267948966-t,o=Math.sin(a),h=Math.sin(s),l=Math.sin(c),m=Math.cos(c),p=i/o,f=p*h,_=p*l;return H(m*f,m*_)},Oe=(e,t)=>{const i=e.width,a=e.height,s=ee(i,t),c=ee(a,t),o=H(e.x+Math.abs(s.x),e.y-Math.abs(s.y)),h=H(e.x+e.width+Math.abs(c.y),e.y+Math.abs(c.x)),l=H(e.x-Math.abs(c.y),e.y+e.height-Math.abs(c.x));return{width:Q(o,h),height:Q(o,l)}},We=(e,t,i=1)=>{const a=e.height/e.width;let s=1,c=t,o=1,h=a;h>c&&(h=c,o=h/a);const l=Math.max(s/o,c/h),m=e.width/(i*l*o),p=m*t;return{width:m,height:p}},ie=(e,t,i,a)=>{const s=a.x>.5?1-a.x:a.x,c=a.y>.5?1-a.y:a.y,o=s*2*e.width,h=c*2*e.height,l=Oe(t,i);return Math.max(l.width/o,l.height/h)},ae=(e,t)=>{let i=e.width,a=i*t;a>e.height&&(a=e.height,i=a/t);const s=(e.width-i)*.5,c=(e.height-a)*.5;return{x:s,y:c,width:i,height:a}},ke=(e,t={})=>{let{zoom:i,rotation:a,center:s,aspectRatio:c}=t;c||(c=e.height/e.width);const o=We(e,c,i),h={x:o.width*.5,y:o.height*.5},l={x:0,y:0,width:o.width,height:o.height,center:h},m=typeof t.scaleToFit>"u"||t.scaleToFit,p=ie(e,ae(l,c),a,m?s:{x:.5,y:.5}),f=i*p;return{widthFloat:o.width/f,heightFloat:o.height/f,width:Math.round(o.width/f),height:Math.round(o.height/f)}},D={type:"spring",stiffness:.5,damping:.45,mass:10},Le=e=>e.utils.createView({name:"image-bitmap",ignoreRect:!0,mixins:{styles:["scaleX","scaleY"]},create:({root:t,props:i})=>{t.appendChild(i.image)}}),He=e=>e.utils.createView({name:"image-canvas-wrapper",tag:"div",ignoreRect:!0,mixins:{apis:["crop","width","height"],styles:["originX","originY","translateX","translateY","scaleX","scaleY","rotateZ"],animations:{originX:D,originY:D,scaleX:D,scaleY:D,translateX:D,translateY:D,rotateZ:D}},create:({root:t,props:i})=>{i.width=i.image.width,i.height=i.image.height,t.ref.bitmap=t.appendChildView(t.createChildView(Le(e),{image:i.image}))},write:({root:t,props:i})=>{const{flip:a}=i.crop,{bitmap:s}=t.ref;s.scaleX=a.horizontal?-1:1,s.scaleY=a.vertical?-1:1}}),Ne=e=>e.utils.createView({name:"image-clip",tag:"div",ignoreRect:!0,mixins:{apis:["crop","markup","resize","width","height","dirty","background"],styles:["width","height","opacity"],animations:{opacity:{type:"tween",duration:250}}},didWriteView:function({root:t,props:i}){i.background&&(t.element.style.backgroundColor=i.background)},create:({root:t,props:i})=>{t.ref.image=t.appendChildView(t.createChildView(He(e),Object.assign({},i))),t.ref.createMarkup=()=>{t.ref.markup||(t.ref.markup=t.appendChildView(t.createChildView(Ge(e),Object.assign({},i))))},t.ref.destroyMarkup=()=>{t.ref.markup&&(t.removeChildView(t.ref.markup),t.ref.markup=null)};const a=t.query("GET_IMAGE_PREVIEW_TRANSPARENCY_INDICATOR");a!==null&&(a==="grid"?t.element.dataset.transparencyIndicator=a:t.element.dataset.transparencyIndicator="color")},write:({root:t,props:i,shouldOptimize:a})=>{const{crop:s,markup:c,resize:o,dirty:h,width:l,height:m}=i;t.ref.image.crop=s;const p={x:0,y:0,width:l,height:m,center:{x:l*.5,y:m*.5}},f={width:t.ref.image.width,height:t.ref.image.height},_={x:s.center.x*f.width,y:s.center.y*f.height},E={x:p.center.x-f.width*s.center.x,y:p.center.y-f.height*s.center.y},w=Math.PI*2+s.rotation%(Math.PI*2),T=s.aspectRatio||f.height/f.width,d=typeof s.scaleToFit>"u"||s.scaleToFit,M=ie(f,ae(p,T),w,d?s.center:{x:.5,y:.5}),n=s.zoom*M;c&&c.length?(t.ref.createMarkup(),t.ref.markup.width=l,t.ref.markup.height=m,t.ref.markup.resize=o,t.ref.markup.dirty=h,t.ref.markup.markup=c,t.ref.markup.crop=ke(f,s)):t.ref.markup&&t.ref.destroyMarkup();const r=t.ref.image;if(a){r.originX=null,r.originY=null,r.translateX=null,r.translateY=null,r.rotateZ=null,r.scaleX=null,r.scaleY=null;return}r.originX=_.x,r.originY=_.y,r.translateX=E.x,r.translateY=E.y,r.rotateZ=w,r.scaleX=n,r.scaleY=n}}),be=e=>e.utils.createView({name:"image-preview",tag:"div",ignoreRect:!0,mixins:{apis:["image","crop","markup","resize","dirty","background"],styles:["translateY","scaleX","scaleY","opacity"],animations:{scaleX:D,scaleY:D,translateY:D,opacity:{type:"tween",duration:400}}},create:({root:t,props:i})=>{t.ref.clip=t.appendChildView(t.createChildView(Ne(e),{id:i.id,image:i.image,crop:i.crop,markup:i.markup,resize:i.resize,dirty:i.dirty,background:i.background}))},write:({root:t,props:i,shouldOptimize:a})=>{const{clip:s}=t.ref,{image:c,crop:o,markup:h,resize:l,dirty:m}=i;if(s.crop=o,s.markup=h,s.resize=l,s.dirty=m,s.opacity=a?0:1,a||t.rect.element.hidden)return;const p=c.height/c.width;let f=o.aspectRatio||p;const _=t.rect.inner.width,E=t.rect.inner.height;let w=t.query("GET_IMAGE_PREVIEW_HEIGHT");const T=t.query("GET_IMAGE_PREVIEW_MIN_HEIGHT"),d=t.query("GET_IMAGE_PREVIEW_MAX_HEIGHT"),M=t.query("GET_PANEL_ASPECT_RATIO"),n=t.query("GET_ALLOW_MULTIPLE");M&&!n&&(w=_*M,f=M);let r=w!==null?w:Math.max(T,Math.min(_*f,d)),g=r/f;g>_&&(g=_,r=g*f),r>E&&(r=E,g=E/f),s.width=g,s.height=r}});let Fe=`<svg width="500" height="200" viewBox="0 0 500 200" preserveAspectRatio="none">
    <defs>
        <radialGradient id="gradient-__UID__" cx=".5" cy="1.25" r="1.15">
            <stop offset='50%' stop-color='#000000'/>
            <stop offset='56%' stop-color='#0a0a0a'/>
            <stop offset='63%' stop-color='#262626'/>
            <stop offset='69%' stop-color='#4f4f4f'/>
            <stop offset='75%' stop-color='#808080'/>
            <stop offset='81%' stop-color='#b1b1b1'/>
            <stop offset='88%' stop-color='#dadada'/>
            <stop offset='94%' stop-color='#f6f6f6'/>
            <stop offset='100%' stop-color='#ffffff'/>
        </radialGradient>
        <mask id="mask-__UID__">
            <rect x="0" y="0" width="500" height="200" fill="url(#gradient-__UID__)"></rect>
        </mask>
    </defs>
    <rect x="0" width="500" height="200" fill="currentColor" mask="url(#mask-__UID__)"></rect>
</svg>`,te=0;const Ue=e=>e.utils.createView({name:"image-preview-overlay",tag:"div",ignoreRect:!0,create:({root:t,props:i})=>{let a=Fe;if(document.querySelector("base")){const s=new URL(window.location.href.replace(window.location.hash,"")).href;a=a.replace(/url\(\#/g,"url("+s+"#")}te++,t.element.classList.add(`filepond--image-preview-overlay-${i.status}`),t.element.innerHTML=a.replace(/__UID__/g,te)},mixins:{styles:["opacity"],animations:{opacity:{type:"spring",mass:25}}}}),qe=function(){self.onmessage=e=>{createImageBitmap(e.data.message.file).then(t=>{self.postMessage({id:e.data.id,message:t},[t])})}},Be=function(){self.onmessage=e=>{const t=e.data.message.imageData,i=e.data.message.colorMatrix,a=t.data,s=a.length,c=i[0],o=i[1],h=i[2],l=i[3],m=i[4],p=i[5],f=i[6],_=i[7],E=i[8],w=i[9],T=i[10],d=i[11],M=i[12],n=i[13],r=i[14],g=i[15],u=i[16],y=i[17],I=i[18],A=i[19];let x=0,C=0,P=0,R=0,V=0;for(;x<s;x+=4)C=a[x]/255,P=a[x+1]/255,R=a[x+2]/255,V=a[x+3]/255,a[x]=Math.max(0,Math.min((C*c+P*o+R*h+V*l+m)*255,255)),a[x+1]=Math.max(0,Math.min((C*p+P*f+R*_+V*E+w)*255,255)),a[x+2]=Math.max(0,Math.min((C*T+P*d+R*M+V*n+r)*255,255)),a[x+3]=Math.max(0,Math.min((C*g+P*u+R*y+V*I+A)*255,255));self.postMessage({id:e.data.id,message:t},[t.data.buffer])}},Ye=(e,t)=>{let i=new Image;i.onload=()=>{const a=i.naturalWidth,s=i.naturalHeight;i=null,t(a,s)},i.src=e},ze={1:()=>[1,0,0,1,0,0],2:e=>[-1,0,0,1,e,0],3:(e,t)=>[-1,0,0,-1,e,t],4:(e,t)=>[1,0,0,-1,0,t],5:()=>[0,1,1,0,0,0],6:(e,t)=>[0,1,-1,0,t,0],7:(e,t)=>[0,-1,-1,0,t,e],8:e=>[0,-1,1,0,0,e]},Xe=(e,t,i,a)=>{a!==-1&&e.transform.apply(e,ze[a](t,i))},Ze=(e,t,i,a)=>{t=Math.round(t),i=Math.round(i);const s=document.createElement("canvas");s.width=t,s.height=i;const c=s.getContext("2d");return a>=5&&a<=8&&([t,i]=[i,t]),Xe(c,t,i,a),c.drawImage(e,0,0,t,i),s},ne=e=>/^image/.test(e.type)&&!/svg/.test(e.type),$e=10,je=10,Ke=e=>{const t=Math.min($e/e.width,je/e.height),i=document.createElement("canvas"),a=i.getContext("2d"),s=i.width=Math.ceil(e.width*t),c=i.height=Math.ceil(e.height*t);a.drawImage(e,0,0,s,c);let o=null;try{o=a.getImageData(0,0,s,c).data}catch{return null}const h=o.length;let l=0,m=0,p=0,f=0;for(;f<h;f+=4)l+=o[f]*o[f],m+=o[f+1]*o[f+1],p+=o[f+2]*o[f+2];return l=Y(l,h),m=Y(m,h),p=Y(p,h),{r:l,g:m,b:p}},Y=(e,t)=>Math.floor(Math.sqrt(e/(t/4))),Je=(e,t)=>(t=t||document.createElement("canvas"),t.width=e.width,t.height=e.height,t.getContext("2d").drawImage(e,0,0),t),Qe=e=>{let t;try{t=new ImageData(e.width,e.height)}catch{t=document.createElement("canvas").getContext("2d").createImageData(e.width,e.height)}return t.data.set(new Uint8ClampedArray(e.data)),t},et=e=>new Promise((t,i)=>{const a=new Image;a.crossOrigin="Anonymous",a.onload=()=>{t(a)},a.onerror=s=>{i(s)},a.src=e}),tt=e=>{const t=Ue(e),i=be(e),{createWorker:a}=e.utils,s=(n,r,g)=>new Promise(u=>{n.ref.imageData||(n.ref.imageData=g.getContext("2d").getImageData(0,0,g.width,g.height));const y=Qe(n.ref.imageData);if(!r||r.length!==20)return g.getContext("2d").putImageData(y,0,0),u();const I=a(Be);I.post({imageData:y,colorMatrix:r},A=>{g.getContext("2d").putImageData(A,0,0),I.terminate(),u()},[y.data.buffer])}),c=(n,r)=>{n.removeChildView(r),r.image.width=1,r.image.height=1,r._destroy()},o=({root:n})=>{const r=n.ref.images.shift();return r.opacity=0,r.translateY=-15,n.ref.imageViewBin.push(r),r},h=({root:n,props:r,image:g})=>{const u=r.id,y=n.query("GET_ITEM",{id:u});if(!y)return;const I=y.getMetadata("crop")||{center:{x:.5,y:.5},flip:{horizontal:!1,vertical:!1},zoom:1,rotation:0,aspectRatio:null},A=n.query("GET_IMAGE_TRANSFORM_CANVAS_BACKGROUND_COLOR");let x,C,P=!1;n.query("GET_IMAGE_PREVIEW_MARKUP_SHOW")&&(x=y.getMetadata("markup")||[],C=y.getMetadata("resize"),P=!0);const R=n.appendChildView(n.createChildView(i,{id:u,image:g,crop:I,resize:C,markup:x,dirty:P,background:A,opacity:0,scaleX:1.15,scaleY:1.15,translateY:15}),n.childViews.length);n.ref.images.push(R),R.opacity=1,R.scaleX=1,R.scaleY=1,R.translateY=0,setTimeout(()=>{n.dispatch("DID_IMAGE_PREVIEW_SHOW",{id:u})},250)},l=({root:n,props:r})=>{const g=n.query("GET_ITEM",{id:r.id});if(!g)return;const u=n.ref.images[n.ref.images.length-1];u.crop=g.getMetadata("crop"),u.background=n.query("GET_IMAGE_TRANSFORM_CANVAS_BACKGROUND_COLOR"),n.query("GET_IMAGE_PREVIEW_MARKUP_SHOW")&&(u.dirty=!0,u.resize=g.getMetadata("resize"),u.markup=g.getMetadata("markup"))},m=({root:n,props:r,action:g})=>{if(!/crop|filter|markup|resize/.test(g.change.key)||!n.ref.images.length)return;const u=n.query("GET_ITEM",{id:r.id});if(u){if(/filter/.test(g.change.key)){const y=n.ref.images[n.ref.images.length-1];s(n,g.change.value,y.image);return}if(/crop|markup|resize/.test(g.change.key)){const y=u.getMetadata("crop"),I=n.ref.images[n.ref.images.length-1];if(y&&y.aspectRatio&&I.crop&&I.crop.aspectRatio&&Math.abs(y.aspectRatio-I.crop.aspectRatio)>1e-5){const A=o({root:n});h({root:n,props:r,image:Je(A.image)})}else l({root:n,props:r})}}},p=n=>{const g=window.navigator.userAgent.match(/Firefox\/([0-9]+)\./),u=g?parseInt(g[1]):null;return u!==null&&u<=58?!1:"createImageBitmap"in window&&ne(n)},f=({root:n,props:r})=>{const{id:g}=r,u=n.query("GET_ITEM",g);if(!u)return;const y=URL.createObjectURL(u.file);Ye(y,(I,A)=>{n.dispatch("DID_IMAGE_PREVIEW_CALCULATE_SIZE",{id:g,width:I,height:A})})},_=({root:n,props:r})=>{const{id:g}=r,u=n.query("GET_ITEM",g);if(!u)return;const y=URL.createObjectURL(u.file),I=()=>{et(y).then(A)},A=x=>{URL.revokeObjectURL(y);const P=(u.getMetadata("exif")||{}).orientation||-1;let{width:R,height:V}=x;if(!R||!V)return;P>=5&&P<=8&&([R,V]=[V,R]);const B=Math.max(1,window.devicePixelRatio*.75),b=n.query("GET_IMAGE_PREVIEW_ZOOM_FACTOR")*B,O=V/R,k=n.rect.element.width,se=n.rect.element.height;let L=k,F=L*O;O>1?(L=Math.min(R,k*b),F=L*O):(F=Math.min(V,se*b),L=F/O);const X=Ze(x,L,F,P),Z=()=>{const re=n.query("GET_IMAGE_PREVIEW_CALCULATE_AVERAGE_IMAGE_COLOR")?Ke(data):null;u.setMetadata("color",re,!0),"close"in x&&x.close(),n.ref.overlayShadow.opacity=1,h({root:n,props:r,image:X})},$=u.getMetadata("filter");$?s(n,$,X).then(Z):Z()};if(p(u.file)){const x=a(qe);x.post({file:u.file},C=>{if(x.terminate(),!C){I();return}A(C)})}else I()},E=({root:n})=>{const r=n.ref.images[n.ref.images.length-1];r.translateY=0,r.scaleX=1,r.scaleY=1,r.opacity=1},w=({root:n})=>{n.ref.overlayShadow.opacity=1,n.ref.overlayError.opacity=0,n.ref.overlaySuccess.opacity=0},T=({root:n})=>{n.ref.overlayShadow.opacity=.25,n.ref.overlayError.opacity=1},d=({root:n})=>{n.ref.overlayShadow.opacity=.25,n.ref.overlaySuccess.opacity=1},M=({root:n})=>{n.ref.images=[],n.ref.imageData=null,n.ref.imageViewBin=[],n.ref.overlayShadow=n.appendChildView(n.createChildView(t,{opacity:0,status:"idle"})),n.ref.overlaySuccess=n.appendChildView(n.createChildView(t,{opacity:0,status:"success"})),n.ref.overlayError=n.appendChildView(n.createChildView(t,{opacity:0,status:"failure"}))};return e.utils.createView({name:"image-preview-wrapper",create:M,styles:["height"],apis:["height"],destroy:({root:n})=>{n.ref.images.forEach(r=>{r.image.width=1,r.image.height=1})},didWriteView:({root:n})=>{n.ref.images.forEach(r=>{r.dirty=!1})},write:e.utils.createRoute({DID_IMAGE_PREVIEW_DRAW:E,DID_IMAGE_PREVIEW_CONTAINER_CREATE:f,DID_FINISH_CALCULATE_PREVIEWSIZE:_,DID_UPDATE_ITEM_METADATA:m,DID_THROW_ITEM_LOAD_ERROR:T,DID_THROW_ITEM_PROCESSING_ERROR:T,DID_THROW_ITEM_INVALID:T,DID_COMPLETE_ITEM_PROCESSING:d,DID_START_ITEM_PROCESSING:w,DID_REVERT_ITEM_PROCESSING:w},({root:n})=>{const r=n.ref.imageViewBin.filter(g=>g.opacity===0);n.ref.imageViewBin=n.ref.imageViewBin.filter(g=>g.opacity>0),r.forEach(g=>c(n,g)),r.length=0})})},it=e=>{const{addFilter:t,utils:i}=e,{Type:a,createRoute:s,isFile:c}=i,o=tt(e);return t("CREATE_VIEW",h=>{const{is:l,view:m,query:p}=h;if(!l("file")||!p("GET_ALLOW_IMAGE_PREVIEW"))return;const f=({root:d,props:M})=>{const{id:n}=M,r=p("GET_ITEM",n);if(!r||!c(r.file)||r.archived)return;const g=r.file;if(!ce(g)||!p("GET_IMAGE_PREVIEW_FILTER_ITEM")(r))return;const u="createImageBitmap"in(window||{}),y=p("GET_IMAGE_PREVIEW_MAX_FILE_SIZE");if(!u&&y&&g.size>y)return;d.ref.imagePreview=m.appendChildView(m.createChildView(o,{id:n}));const I=d.query("GET_IMAGE_PREVIEW_HEIGHT");I&&d.dispatch("DID_UPDATE_PANEL_HEIGHT",{id:r.id,height:I});const A=!u&&g.size>p("GET_IMAGE_PREVIEW_MAX_INSTANT_PREVIEW_FILE_SIZE");d.dispatch("DID_IMAGE_PREVIEW_CONTAINER_CREATE",{id:n},A)},_=(d,M)=>{if(!d.ref.imagePreview)return;let{id:n}=M;const r=d.query("GET_ITEM",{id:n});if(!r)return;const g=d.query("GET_PANEL_ASPECT_RATIO"),u=d.query("GET_ITEM_PANEL_ASPECT_RATIO"),y=d.query("GET_IMAGE_PREVIEW_HEIGHT");if(g||u||y)return;let{imageWidth:I,imageHeight:A}=d.ref;if(!I||!A)return;const x=d.query("GET_IMAGE_PREVIEW_MIN_HEIGHT"),C=d.query("GET_IMAGE_PREVIEW_MAX_HEIGHT"),R=(r.getMetadata("exif")||{}).orientation||-1;if(R>=5&&R<=8&&([I,A]=[A,I]),!ne(r.file)||d.query("GET_IMAGE_PREVIEW_UPSCALE")){const k=2048/I;I*=k,A*=k}const V=A/I,B=(r.getMetadata("crop")||{}).aspectRatio||V;let z=Math.max(x,Math.min(A,C));const b=d.rect.element.width,O=Math.min(b*B,z);d.dispatch("DID_UPDATE_PANEL_HEIGHT",{id:r.id,height:O})},E=({root:d})=>{d.ref.shouldRescale=!0},w=({root:d,action:M})=>{M.change.key==="crop"&&(d.ref.shouldRescale=!0)},T=({root:d,action:M})=>{d.ref.imageWidth=M.width,d.ref.imageHeight=M.height,d.ref.shouldRescale=!0,d.ref.shouldDrawPreview=!0,d.dispatch("KICK")};m.registerWriter(s({DID_RESIZE_ROOT:E,DID_STOP_RESIZE:E,DID_LOAD_ITEM:f,DID_IMAGE_PREVIEW_CALCULATE_SIZE:T,DID_UPDATE_ITEM_METADATA:w},({root:d,props:M})=>{d.ref.imagePreview&&(d.rect.element.hidden||(d.ref.shouldRescale&&(_(d,M),d.ref.shouldRescale=!1),d.ref.shouldDrawPreview&&(requestAnimationFrame(()=>{requestAnimationFrame(()=>{d.dispatch("DID_FINISH_CALCULATE_PREVIEWSIZE",{id:M.id})})}),d.ref.shouldDrawPreview=!1)))}))}),{options:{allowImagePreview:[!0,a.BOOLEAN],imagePreviewFilterItem:[()=>!0,a.FUNCTION],imagePreviewHeight:[null,a.INT],imagePreviewMinHeight:[44,a.INT],imagePreviewMaxHeight:[256,a.INT],imagePreviewMaxFileSize:[null,a.INT],imagePreviewZoomFactor:[2,a.INT],imagePreviewUpscale:[!1,a.BOOLEAN],imagePreviewMaxInstantPreviewFileSize:[1e6,a.INT],imagePreviewTransparencyIndicator:[null,a.STRING],imagePreviewCalculateAverageImageColor:[!1,a.BOOLEAN],imagePreviewMarkupShow:[!0,a.BOOLEAN],imagePreviewMarkupFilter:[()=>!0,a.FUNCTION]}}},at=typeof window<"u"&&typeof window.document<"u";at&&document.dispatchEvent(new CustomEvent("FilePond:pluginloaded",{detail:it}));export{it as default};
