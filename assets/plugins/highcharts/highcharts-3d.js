/*
 Highcharts JS v6.1.3 (2018-09-12)

 3D features for Highcharts JS

 @license: www.highcharts.com/license
*/
(function(B){"object"===typeof module&&module.exports?module.exports=B:"function"===typeof define&&define.amd?define(function(){return B}):B(Highcharts)})(function(B){(function(b){var u=b.deg2rad,y=b.pick;b.perspective3D=function(b,q,z){q=0<z&&z<Number.POSITIVE_INFINITY?z/(b.z+q.z+z):1;return{x:b.x*q,y:b.y*q}};b.perspective=function(v,q,z){var A=q.options.chart.options3d,g=z?q.inverted:!1,n={x:q.plotWidth/2,y:q.plotHeight/2,z:A.depth/2,vd:y(A.depth,1)*y(A.viewDistance,0)},x=q.scale3d||1,p=u*A.beta*
(g?-1:1),A=u*A.alpha*(g?-1:1),m=Math.cos(A),a=Math.cos(-p),f=Math.sin(A),k=Math.sin(-p);z||(n.x+=q.plotLeft,n.y+=q.plotTop);return b.map(v,function(h){var e;e=(g?h.y:h.x)-n.x;var d=(g?h.x:h.y)-n.y;h=(h.z||0)-n.z;e={x:a*e-k*h,y:-f*k*e+m*d-a*f*h,z:m*k*e+f*d+m*a*h};d=b.perspective3D(e,n,n.vd);d.x=d.x*x+n.x;d.y=d.y*x+n.y;d.z=e.z*x+n.z;return{x:g?d.y:d.x,y:g?d.x:d.y,z:d.z}})};b.pointCameraDistance=function(b,q){var v=q.options.chart.options3d,A=q.plotWidth/2;q=q.plotHeight/2;v=y(v.depth,1)*y(v.viewDistance,
0)+v.depth;return Math.sqrt(Math.pow(A-b.plotX,2)+Math.pow(q-b.plotY,2)+Math.pow(v-b.plotZ,2))};b.shapeArea=function(b){var q=0,v,A;for(v=0;v<b.length;v++)A=(v+1)%b.length,q+=b[v].x*b[A].y-b[A].x*b[v].y;return q/2};b.shapeArea3d=function(v,q,z){return b.shapeArea(b.perspective(v,q,z))}})(B);(function(b){function u(a,c,d,b,f,C,h,e){var r=[],E=C-f;return C>f&&C-f>Math.PI/2+.0001?(r=r.concat(u(a,c,d,b,f,f+Math.PI/2,h,e)),r=r.concat(u(a,c,d,b,f+Math.PI/2,C,h,e))):C<f&&f-C>Math.PI/2+.0001?(r=r.concat(u(a,
c,d,b,f,f-Math.PI/2,h,e)),r=r.concat(u(a,c,d,b,f-Math.PI/2,C,h,e))):["C",a+d*Math.cos(f)-d*t*E*Math.sin(f)+h,c+b*Math.sin(f)+b*t*E*Math.cos(f)+e,a+d*Math.cos(C)+d*t*E*Math.sin(C)+h,c+b*Math.sin(C)-b*t*E*Math.cos(C)+e,a+d*Math.cos(C)+h,c+b*Math.sin(C)+e]}var y=Math.cos,v=Math.PI,q=Math.sin,z=b.animObject,A=b.charts,g=b.color,n=b.defined,x=b.deg2rad,p=b.each,m=b.extend,a=b.inArray,f=b.map,k=b.merge,h=b.perspective,e=b.pick,d=b.SVGElement,c=b.SVGRenderer,l=b.wrap,t=4*(Math.sqrt(2)-1)/3/(v/2);c.prototype.toLinePath=
function(a,c){var d=[];p(a,function(a){d.push("L",a.x,a.y)});a.length&&(d[0]="M",c&&d.push("Z"));return d};c.prototype.toLineSegments=function(a){var c=[],d=!0;p(a,function(a){c.push(d?"M":"L",a.x,a.y);d=!d});return c};c.prototype.face3d=function(a){var c=this,d=this.createElement("path");d.vertexes=[];d.insidePlotArea=!1;d.enabled=!0;l(d,"attr",function(a,d){if("object"===typeof d&&(n(d.enabled)||n(d.vertexes)||n(d.insidePlotArea))){this.enabled=e(d.enabled,this.enabled);this.vertexes=e(d.vertexes,
this.vertexes);this.insidePlotArea=e(d.insidePlotArea,this.insidePlotArea);delete d.enabled;delete d.vertexes;delete d.insidePlotArea;var r=h(this.vertexes,A[c.chartIndex],this.insidePlotArea),f=c.toLinePath(r,!0),r=b.shapeArea(r),r=this.enabled&&0<r?"visible":"hidden";d.d=f;d.visibility=r}return a.apply(this,[].slice.call(arguments,1))});l(d,"animate",function(a,d){if("object"===typeof d&&(n(d.enabled)||n(d.vertexes)||n(d.insidePlotArea))){this.enabled=e(d.enabled,this.enabled);this.vertexes=e(d.vertexes,
this.vertexes);this.insidePlotArea=e(d.insidePlotArea,this.insidePlotArea);delete d.enabled;delete d.vertexes;delete d.insidePlotArea;var r=h(this.vertexes,A[c.chartIndex],this.insidePlotArea),f=c.toLinePath(r,!0),r=b.shapeArea(r),r=this.enabled&&0<r?"visible":"hidden";d.d=f;this.attr("visibility",r)}return a.apply(this,[].slice.call(arguments,1))});return d.attr(a)};c.prototype.polyhedron=function(a){var d=this,c=this.g(),b=c.destroy;c.attr({"stroke-linejoin":"round"});c.faces=[];c.destroy=function(){for(var a=
0;a<c.faces.length;a++)c.faces[a].destroy();return b.call(this)};l(c,"attr",function(a,b,f,r,E){if("object"===typeof b&&n(b.faces)){for(;c.faces.length>b.faces.length;)c.faces.pop().destroy();for(;c.faces.length<b.faces.length;)c.faces.push(d.face3d().add(c));for(var w=0;w<b.faces.length;w++)c.faces[w].attr(b.faces[w],null,r,E);delete b.faces}return a.apply(this,[].slice.call(arguments,1))});l(c,"animate",function(a,b,f,r){if(b&&b.faces){for(;c.faces.length>b.faces.length;)c.faces.pop().destroy();
for(;c.faces.length<b.faces.length;)c.faces.push(d.face3d().add(c));for(var E=0;E<b.faces.length;E++)c.faces[E].animate(b.faces[E],f,r);delete b.faces}return a.apply(this,[].slice.call(arguments,1))});return c.attr(a)};c.prototype.cuboid=function(a){var c=this.g(),b=c.destroy;a=this.cuboidPath(a);c.attr({"stroke-linejoin":"round"});c.front=this.path(a[0]).attr({"class":"highcharts-3d-front"}).add(c);c.top=this.path(a[1]).attr({"class":"highcharts-3d-top"}).add(c);c.side=this.path(a[2]).attr({"class":"highcharts-3d-side"}).add(c);
c.fillSetter=function(a){this.front.attr({fill:a});this.top.attr({fill:g(a).brighten(.1).get()});this.side.attr({fill:g(a).brighten(-.1).get()});this.color=a;c.fill=a;return this};c.opacitySetter=function(a){this.front.attr({opacity:a});this.top.attr({opacity:a});this.side.attr({opacity:a});return this};c.attr=function(a,c,b,f){if("string"===typeof a&&"undefined"!==typeof c){var r=a;a={};a[r]=c}if(a.shapeArgs||n(a.x))a=this.renderer.cuboidPath(a.shapeArgs||a),this.front.attr({d:a[0]}),this.top.attr({d:a[1]}),
this.side.attr({d:a[2]});else return d.prototype.attr.call(this,a,void 0,b,f);return this};c.animate=function(a,c,b){n(a.x)&&n(a.y)?(a=this.renderer.cuboidPath(a),this.front.animate({d:a[0]},c,b),this.top.animate({d:a[1]},c,b),this.side.animate({d:a[2]},c,b),this.attr({zIndex:-a[3]})):a.opacity?(this.front.animate(a,c,b),this.top.animate(a,c,b),this.side.animate(a,c,b)):d.prototype.animate.call(this,a,c,b);return this};c.destroy=function(){this.front.destroy();this.top.destroy();this.side.destroy();
return b.call(this)};c.attr({zIndex:-a[3]});return c};b.SVGRenderer.prototype.cuboidPath=function(a){function c(a){return n[a]}var d=a.x,e=a.y,w=a.z,t=a.height,m=a.width,k=a.depth,l=A[this.chartIndex],p,g,q=l.options.chart.options3d.alpha,v=0,n=[{x:d,y:e,z:w},{x:d+m,y:e,z:w},{x:d+m,y:e+t,z:w},{x:d,y:e+t,z:w},{x:d,y:e+t,z:w+k},{x:d+m,y:e+t,z:w+k},{x:d+m,y:e,z:w+k},{x:d,y:e,z:w+k}],n=h(n,l,a.insidePlotArea);g=function(a,d){var e=[[],-1];a=f(a,c);d=f(d,c);0>b.shapeArea(a)?e=[a,0]:0>b.shapeArea(d)&&(e=
[d,1]);return e};p=g([3,2,1,0],[7,6,5,4]);a=p[0];m=p[1];p=g([1,6,7,0],[4,5,2,3]);t=p[0];k=p[1];p=g([1,2,5,6],[0,7,4,3]);g=p[0];p=p[1];1===p?v+=1E4*(1E3-d):p||(v+=1E4*d);v+=10*(!k||0<=q&&180>=q||360>q&&357.5<q?l.plotHeight-e:10+e);1===m?v+=100*w:m||(v+=100*(1E3-w));v=-Math.round(v);return[this.toLinePath(a,!0),this.toLinePath(t,!0),this.toLinePath(g,!0),v]};b.SVGRenderer.prototype.arc3d=function(c){function f(c){var d=!1,b={};c=k(c);for(var f in c)-1!==a(f,t)&&(b[f]=c[f],delete c[f],d=!0);return d?
b:!1}var r=this.g(),h=r.renderer,t="x y r innerR start end".split(" ");c=k(c);c.alpha=(c.alpha||0)*x;c.beta=(c.beta||0)*x;r.top=h.path();r.side1=h.path();r.side2=h.path();r.inn=h.path();r.out=h.path();r.onAdd=function(){var a=r.parentGroup,c=r.attr("class");r.top.add(r);p(["out","inn","side1","side2"],function(d){r[d].attr({"class":c+" highcharts-3d-side"}).add(a)})};p(["addClass","removeClass"],function(a){r[a]=function(){var c=arguments;p(["top","out","inn","side1","side2"],function(d){r[d][a].apply(r[d],
c)})}});r.setPaths=function(a){var c=r.renderer.arc3dPath(a),d=100*c.zTop;r.attribs=a;r.top.attr({d:c.top,zIndex:c.zTop});r.inn.attr({d:c.inn,zIndex:c.zInn});r.out.attr({d:c.out,zIndex:c.zOut});r.side1.attr({d:c.side1,zIndex:c.zSide1});r.side2.attr({d:c.side2,zIndex:c.zSide2});r.zIndex=d;r.attr({zIndex:d});a.center&&(r.top.setRadialReference(a.center),delete a.center)};r.setPaths(c);r.fillSetter=function(a){var c=g(a).brighten(-.1).get();this.fill=a;this.side1.attr({fill:c});this.side2.attr({fill:c});
this.inn.attr({fill:c});this.out.attr({fill:c});this.top.attr({fill:a});return this};p(["opacity","translateX","translateY","visibility"],function(a){r[a+"Setter"]=function(a,c){r[c]=a;p(["out","inn","side1","side2","top"],function(d){r[d].attr(c,a)})}});l(r,"attr",function(a,c){var d;"object"===typeof c&&(d=f(c))&&(m(r.attribs,d),r.setPaths(r.attribs));return a.apply(this,[].slice.call(arguments,1))});l(r,"animate",function(a,c,d,h){var t,m=this.attribs,w,l="data-"+Math.random().toString(26).substring(2,
9);delete c.center;delete c.z;delete c.depth;delete c.alpha;delete c.beta;w=z(e(d,this.renderer.globalAnimation));w.duration&&(t=f(c),r[l]=0,c[l]=1,r[l+"Setter"]=b.noop,t&&(w.step=function(a,c){function d(a){return m[a]+(e(t[a],m[a])-m[a])*c.pos}c.prop===l&&c.elem.setPaths(k(m,{x:d("x"),y:d("y"),r:d("r"),innerR:d("innerR"),start:d("start"),end:d("end")}))}),d=w);return a.call(this,c,d,h)});r.destroy=function(){this.top.destroy();this.out.destroy();this.inn.destroy();this.side1.destroy();this.side2.destroy();
d.prototype.destroy.call(this)};r.hide=function(){this.top.hide();this.out.hide();this.inn.hide();this.side1.hide();this.side2.hide()};r.show=function(){this.top.show();this.out.show();this.inn.show();this.side1.show();this.side2.show()};return r};c.prototype.arc3dPath=function(a){function c(a){a%=2*Math.PI;a>Math.PI&&(a=2*Math.PI-a);return a}var d=a.x,b=a.y,f=a.start,e=a.end-.00001,h=a.r,t=a.innerR||0,m=a.depth||0,l=a.alpha,k=a.beta,w=Math.cos(f),p=Math.sin(f);a=Math.cos(e);var g=Math.sin(e),n=h*
Math.cos(k),h=h*Math.cos(l),A=t*Math.cos(k),z=t*Math.cos(l),t=m*Math.sin(k),x=m*Math.sin(l),m=["M",d+n*w,b+h*p],m=m.concat(u(d,b,n,h,f,e,0,0)),m=m.concat(["L",d+A*a,b+z*g]),m=m.concat(u(d,b,A,z,e,f,0,0)),m=m.concat(["Z"]),B=0<k?Math.PI/2:0,k=0<l?0:Math.PI/2,B=f>-B?f:e>-B?-B:f,D=e<v-k?e:f<v-k?v-k:e,F=2*v-k,l=["M",d+n*y(B),b+h*q(B)],l=l.concat(u(d,b,n,h,B,D,0,0));e>F&&f<F?(l=l.concat(["L",d+n*y(D)+t,b+h*q(D)+x]),l=l.concat(u(d,b,n,h,D,F,t,x)),l=l.concat(["L",d+n*y(F),b+h*q(F)]),l=l.concat(u(d,b,n,h,
F,e,0,0)),l=l.concat(["L",d+n*y(e)+t,b+h*q(e)+x]),l=l.concat(u(d,b,n,h,e,F,t,x)),l=l.concat(["L",d+n*y(F),b+h*q(F)]),l=l.concat(u(d,b,n,h,F,D,0,0))):e>v-k&&f<v-k&&(l=l.concat(["L",d+n*Math.cos(D)+t,b+h*Math.sin(D)+x]),l=l.concat(u(d,b,n,h,D,e,t,x)),l=l.concat(["L",d+n*Math.cos(e),b+h*Math.sin(e)]),l=l.concat(u(d,b,n,h,e,D,0,0)));l=l.concat(["L",d+n*Math.cos(D)+t,b+h*Math.sin(D)+x]);l=l.concat(u(d,b,n,h,D,B,t,x));l=l.concat(["Z"]);k=["M",d+A*w,b+z*p];k=k.concat(u(d,b,A,z,f,e,0,0));k=k.concat(["L",
d+A*Math.cos(e)+t,b+z*Math.sin(e)+x]);k=k.concat(u(d,b,A,z,e,f,t,x));k=k.concat(["Z"]);w=["M",d+n*w,b+h*p,"L",d+n*w+t,b+h*p+x,"L",d+A*w+t,b+z*p+x,"L",d+A*w,b+z*p,"Z"];d=["M",d+n*a,b+h*g,"L",d+n*a+t,b+h*g+x,"L",d+A*a+t,b+z*g+x,"L",d+A*a,b+z*g,"Z"];g=Math.atan2(x,-t);b=Math.abs(e+g);a=Math.abs(f+g);f=Math.abs((f+e)/2+g);b=c(b);a=c(a);f=c(f);f*=1E5;e=1E5*a;b*=1E5;return{top:m,zTop:1E5*Math.PI+1,out:l,zOut:Math.max(f,e,b),inn:k,zInn:Math.max(f,e,b),side1:w,zSide1:.99*b,side2:d,zSide2:.99*e}}})(B);(function(b){function u(b,
m){var a=b.plotLeft,f=b.plotWidth+a,k=b.plotTop,h=b.plotHeight+k,e=a+b.plotWidth/2,d=k+b.plotHeight/2,c=Number.MAX_VALUE,l=-Number.MAX_VALUE,t=Number.MAX_VALUE,w=-Number.MAX_VALUE,p,r=1;p=[{x:a,y:k,z:0},{x:a,y:k,z:m}];q([0,1],function(a){p.push({x:f,y:p[a].y,z:p[a].z})});q([0,1,2,3],function(a){p.push({x:p[a].x,y:h,z:p[a].z})});p=A(p,b,!1);q(p,function(a){c=Math.min(c,a.x);l=Math.max(l,a.x);t=Math.min(t,a.y);w=Math.max(w,a.y)});a>c&&(r=Math.min(r,1-Math.abs((a+e)/(c+e))%1));f<l&&(r=Math.min(r,(f-
e)/(l-e)));k>t&&(r=0>t?Math.min(r,(k+d)/(-t+k+d)):Math.min(r,1-(k+d)/(t+d)%1));h<w&&(r=Math.min(r,Math.abs((h-d)/(w-d))));return r}var y=b.addEvent,v=b.Chart,q=b.each,z=b.merge,A=b.perspective,g=b.pick,n=b.wrap;v.prototype.is3d=function(){return this.options.chart.options3d&&this.options.chart.options3d.enabled};v.prototype.propsRequireDirtyBox.push("chart.options3d");v.prototype.propsRequireUpdateSeries.push("chart.options3d");y(v,"afterInit",function(){var b=this.options;this.is3d()&&q(b.series||
[],function(m){"scatter"===(m.type||b.chart.type||b.chart.defaultSeriesType)&&(m.type="scatter3d")})});y(v,"addSeries",function(b){this.is3d()&&"scatter"===b.options.type&&(b.options.type="scatter3d")});b.wrap(b.Chart.prototype,"isInsidePlot",function(b){return this.is3d()||b.apply(this,[].slice.call(arguments,1))});var x=b.getOptions();z(!0,x,{chart:{options3d:{enabled:!1,alpha:0,beta:0,depth:100,fitToPlot:!0,viewDistance:25,axisLabelPosition:null,frame:{visible:"default",size:1,bottom:{},top:{},
left:{},right:{},back:{},front:{}}}}});n(v.prototype,"setClassName",function(b){b.apply(this,[].slice.call(arguments,1));this.is3d()&&(this.container.className+=" highcharts-3d-chart")});y(b.Chart,"afterSetChartSize",function(){var b=this.options.chart.options3d;if(this.is3d()){var m=this.inverted,a=this.clipBox,f=this.margin;a[m?"y":"x"]=-(f[3]||0);a[m?"x":"y"]=-(f[0]||0);a[m?"height":"width"]=this.chartWidth+(f[3]||0)+(f[1]||0);a[m?"width":"height"]=this.chartHeight+(f[0]||0)+(f[2]||0);this.scale3d=
1;!0===b.fitToPlot&&(this.scale3d=u(this,b.depth));this.frame3d=this.get3dFrame()}});y(v,"beforeRedraw",function(){this.is3d()&&(this.isDirtyBox=!0)});y(v,"beforeRender",function(){this.is3d()&&(this.frame3d=this.get3dFrame())});n(v.prototype,"renderSeries",function(b){var m=this.series.length;if(this.is3d())for(;m--;)b=this.series[m],b.translate(),b.render();else b.call(this)});y(v,"afterDrawChartBox",function(){if(this.is3d()){var p=this.renderer,m=this.options.chart.options3d,a=this.get3dFrame(),
f=this.plotLeft,k=this.plotLeft+this.plotWidth,h=this.plotTop,e=this.plotTop+this.plotHeight,m=m.depth,d=f-(a.left.visible?a.left.size:0),c=k+(a.right.visible?a.right.size:0),l=h-(a.top.visible?a.top.size:0),t=e+(a.bottom.visible?a.bottom.size:0),w=0-(a.front.visible?a.front.size:0),g=m+(a.back.visible?a.back.size:0),r=this.hasRendered?"animate":"attr";this.frame3d=a;this.frameShapes||(this.frameShapes={bottom:p.polyhedron().add(),top:p.polyhedron().add(),left:p.polyhedron().add(),right:p.polyhedron().add(),
back:p.polyhedron().add(),front:p.polyhedron().add()});this.frameShapes.bottom[r]({"class":"highcharts-3d-frame highcharts-3d-frame-bottom",zIndex:a.bottom.frontFacing?-1E3:1E3,faces:[{fill:b.color(a.bottom.color).brighten(.1).get(),vertexes:[{x:d,y:t,z:w},{x:c,y:t,z:w},{x:c,y:t,z:g},{x:d,y:t,z:g}],enabled:a.bottom.visible},{fill:b.color(a.bottom.color).brighten(.1).get(),vertexes:[{x:f,y:e,z:m},{x:k,y:e,z:m},{x:k,y:e,z:0},{x:f,y:e,z:0}],enabled:a.bottom.visible},{fill:b.color(a.bottom.color).brighten(-.1).get(),
vertexes:[{x:d,y:t,z:w},{x:d,y:t,z:g},{x:f,y:e,z:m},{x:f,y:e,z:0}],enabled:a.bottom.visible&&!a.left.visible},{fill:b.color(a.bottom.color).brighten(-.1).get(),vertexes:[{x:c,y:t,z:g},{x:c,y:t,z:w},{x:k,y:e,z:0},{x:k,y:e,z:m}],enabled:a.bottom.visible&&!a.right.visible},{fill:b.color(a.bottom.color).get(),vertexes:[{x:c,y:t,z:w},{x:d,y:t,z:w},{x:f,y:e,z:0},{x:k,y:e,z:0}],enabled:a.bottom.visible&&!a.front.visible},{fill:b.color(a.bottom.color).get(),vertexes:[{x:d,y:t,z:g},{x:c,y:t,z:g},{x:k,y:e,
z:m},{x:f,y:e,z:m}],enabled:a.bottom.visible&&!a.back.visible}]});this.frameShapes.top[r]({"class":"highcharts-3d-frame highcharts-3d-frame-top",zIndex:a.top.frontFacing?-1E3:1E3,faces:[{fill:b.color(a.top.color).brighten(.1).get(),vertexes:[{x:d,y:l,z:g},{x:c,y:l,z:g},{x:c,y:l,z:w},{x:d,y:l,z:w}],enabled:a.top.visible},{fill:b.color(a.top.color).brighten(.1).get(),vertexes:[{x:f,y:h,z:0},{x:k,y:h,z:0},{x:k,y:h,z:m},{x:f,y:h,z:m}],enabled:a.top.visible},{fill:b.color(a.top.color).brighten(-.1).get(),
vertexes:[{x:d,y:l,z:g},{x:d,y:l,z:w},{x:f,y:h,z:0},{x:f,y:h,z:m}],enabled:a.top.visible&&!a.left.visible},{fill:b.color(a.top.color).brighten(-.1).get(),vertexes:[{x:c,y:l,z:w},{x:c,y:l,z:g},{x:k,y:h,z:m},{x:k,y:h,z:0}],enabled:a.top.visible&&!a.right.visible},{fill:b.color(a.top.color).get(),vertexes:[{x:d,y:l,z:w},{x:c,y:l,z:w},{x:k,y:h,z:0},{x:f,y:h,z:0}],enabled:a.top.visible&&!a.front.visible},{fill:b.color(a.top.color).get(),vertexes:[{x:c,y:l,z:g},{x:d,y:l,z:g},{x:f,y:h,z:m},{x:k,y:h,z:m}],
enabled:a.top.visible&&!a.back.visible}]});this.frameShapes.left[r]({"class":"highcharts-3d-frame highcharts-3d-frame-left",zIndex:a.left.frontFacing?-1E3:1E3,faces:[{fill:b.color(a.left.color).brighten(.1).get(),vertexes:[{x:d,y:t,z:w},{x:f,y:e,z:0},{x:f,y:e,z:m},{x:d,y:t,z:g}],enabled:a.left.visible&&!a.bottom.visible},{fill:b.color(a.left.color).brighten(.1).get(),vertexes:[{x:d,y:l,z:g},{x:f,y:h,z:m},{x:f,y:h,z:0},{x:d,y:l,z:w}],enabled:a.left.visible&&!a.top.visible},{fill:b.color(a.left.color).brighten(-.1).get(),
vertexes:[{x:d,y:t,z:g},{x:d,y:l,z:g},{x:d,y:l,z:w},{x:d,y:t,z:w}],enabled:a.left.visible},{fill:b.color(a.left.color).brighten(-.1).get(),vertexes:[{x:f,y:h,z:m},{x:f,y:e,z:m},{x:f,y:e,z:0},{x:f,y:h,z:0}],enabled:a.left.visible},{fill:b.color(a.left.color).get(),vertexes:[{x:d,y:t,z:w},{x:d,y:l,z:w},{x:f,y:h,z:0},{x:f,y:e,z:0}],enabled:a.left.visible&&!a.front.visible},{fill:b.color(a.left.color).get(),vertexes:[{x:d,y:l,z:g},{x:d,y:t,z:g},{x:f,y:e,z:m},{x:f,y:h,z:m}],enabled:a.left.visible&&!a.back.visible}]});
this.frameShapes.right[r]({"class":"highcharts-3d-frame highcharts-3d-frame-right",zIndex:a.right.frontFacing?-1E3:1E3,faces:[{fill:b.color(a.right.color).brighten(.1).get(),vertexes:[{x:c,y:t,z:g},{x:k,y:e,z:m},{x:k,y:e,z:0},{x:c,y:t,z:w}],enabled:a.right.visible&&!a.bottom.visible},{fill:b.color(a.right.color).brighten(.1).get(),vertexes:[{x:c,y:l,z:w},{x:k,y:h,z:0},{x:k,y:h,z:m},{x:c,y:l,z:g}],enabled:a.right.visible&&!a.top.visible},{fill:b.color(a.right.color).brighten(-.1).get(),vertexes:[{x:k,
y:h,z:0},{x:k,y:e,z:0},{x:k,y:e,z:m},{x:k,y:h,z:m}],enabled:a.right.visible},{fill:b.color(a.right.color).brighten(-.1).get(),vertexes:[{x:c,y:t,z:w},{x:c,y:l,z:w},{x:c,y:l,z:g},{x:c,y:t,z:g}],enabled:a.right.visible},{fill:b.color(a.right.color).get(),vertexes:[{x:c,y:l,z:w},{x:c,y:t,z:w},{x:k,y:e,z:0},{x:k,y:h,z:0}],enabled:a.right.visible&&!a.front.visible},{fill:b.color(a.right.color).get(),vertexes:[{x:c,y:t,z:g},{x:c,y:l,z:g},{x:k,y:h,z:m},{x:k,y:e,z:m}],enabled:a.right.visible&&!a.back.visible}]});
this.frameShapes.back[r]({"class":"highcharts-3d-frame highcharts-3d-frame-back",zIndex:a.back.frontFacing?-1E3:1E3,faces:[{fill:b.color(a.back.color).brighten(.1).get(),vertexes:[{x:c,y:t,z:g},{x:d,y:t,z:g},{x:f,y:e,z:m},{x:k,y:e,z:m}],enabled:a.back.visible&&!a.bottom.visible},{fill:b.color(a.back.color).brighten(.1).get(),vertexes:[{x:d,y:l,z:g},{x:c,y:l,z:g},{x:k,y:h,z:m},{x:f,y:h,z:m}],enabled:a.back.visible&&!a.top.visible},{fill:b.color(a.back.color).brighten(-.1).get(),vertexes:[{x:d,y:t,
z:g},{x:d,y:l,z:g},{x:f,y:h,z:m},{x:f,y:e,z:m}],enabled:a.back.visible&&!a.left.visible},{fill:b.color(a.back.color).brighten(-.1).get(),vertexes:[{x:c,y:l,z:g},{x:c,y:t,z:g},{x:k,y:e,z:m},{x:k,y:h,z:m}],enabled:a.back.visible&&!a.right.visible},{fill:b.color(a.back.color).get(),vertexes:[{x:f,y:h,z:m},{x:k,y:h,z:m},{x:k,y:e,z:m},{x:f,y:e,z:m}],enabled:a.back.visible},{fill:b.color(a.back.color).get(),vertexes:[{x:d,y:t,z:g},{x:c,y:t,z:g},{x:c,y:l,z:g},{x:d,y:l,z:g}],enabled:a.back.visible}]});this.frameShapes.front[r]({"class":"highcharts-3d-frame highcharts-3d-frame-front",
zIndex:a.front.frontFacing?-1E3:1E3,faces:[{fill:b.color(a.front.color).brighten(.1).get(),vertexes:[{x:d,y:t,z:w},{x:c,y:t,z:w},{x:k,y:e,z:0},{x:f,y:e,z:0}],enabled:a.front.visible&&!a.bottom.visible},{fill:b.color(a.front.color).brighten(.1).get(),vertexes:[{x:c,y:l,z:w},{x:d,y:l,z:w},{x:f,y:h,z:0},{x:k,y:h,z:0}],enabled:a.front.visible&&!a.top.visible},{fill:b.color(a.front.color).brighten(-.1).get(),vertexes:[{x:d,y:l,z:w},{x:d,y:t,z:w},{x:f,y:e,z:0},{x:f,y:h,z:0}],enabled:a.front.visible&&!a.left.visible},
{fill:b.color(a.front.color).brighten(-.1).get(),vertexes:[{x:c,y:t,z:w},{x:c,y:l,z:w},{x:k,y:h,z:0},{x:k,y:e,z:0}],enabled:a.front.visible&&!a.right.visible},{fill:b.color(a.front.color).get(),vertexes:[{x:k,y:h,z:0},{x:f,y:h,z:0},{x:f,y:e,z:0},{x:k,y:e,z:0}],enabled:a.front.visible},{fill:b.color(a.front.color).get(),vertexes:[{x:c,y:t,z:w},{x:d,y:t,z:w},{x:d,y:l,z:w},{x:c,y:l,z:w}],enabled:a.front.visible}]})}});v.prototype.retrieveStacks=function(b){var m=this.series,a={},f,k=1;q(this.series,
function(h){f=g(h.options.stack,b?0:m.length-1-h.index);a[f]?a[f].series.push(h):(a[f]={series:[h],position:k},k++)});a.totalStacks=k+1;return a};v.prototype.get3dFrame=function(){var p=this,m=p.options.chart.options3d,a=m.frame,f=p.plotLeft,k=p.plotLeft+p.plotWidth,h=p.plotTop,e=p.plotTop+p.plotHeight,d=m.depth,c=function(a){a=b.shapeArea3d(a,p);return.5<a?1:-.5>a?-1:0},l=c([{x:f,y:e,z:d},{x:k,y:e,z:d},{x:k,y:e,z:0},{x:f,y:e,z:0}]),t=c([{x:f,y:h,z:0},{x:k,y:h,z:0},{x:k,y:h,z:d},{x:f,y:h,z:d}]),w=
c([{x:f,y:h,z:0},{x:f,y:h,z:d},{x:f,y:e,z:d},{x:f,y:e,z:0}]),n=c([{x:k,y:h,z:d},{x:k,y:h,z:0},{x:k,y:e,z:0},{x:k,y:e,z:d}]),r=c([{x:f,y:e,z:0},{x:k,y:e,z:0},{x:k,y:h,z:0},{x:f,y:h,z:0}]),c=c([{x:f,y:h,z:d},{x:k,y:h,z:d},{x:k,y:e,z:d},{x:f,y:e,z:d}]),v=!1,z=!1,x=!1,u=!1;q([].concat(p.xAxis,p.yAxis,p.zAxis),function(a){a&&(a.horiz?a.opposite?z=!0:v=!0:a.opposite?u=!0:x=!0)});var y=function(a,c,d){for(var b=["size","color","visible"],f={},e=0;e<b.length;e++)for(var h=b[e],l=0;l<a.length;l++)if("object"===
typeof a[l]){var t=a[l][h];if(void 0!==t&&null!==t){f[h]=t;break}}a=d;!0===f.visible||!1===f.visible?a=f.visible:"auto"===f.visible&&(a=0<c);return{size:g(f.size,1),color:g(f.color,"none"),frontFacing:0<c,visible:a}},a={bottom:y([a.bottom,a.top,a],l,v),top:y([a.top,a.bottom,a],t,z),left:y([a.left,a.right,a.side,a],w,x),right:y([a.right,a.left,a.side,a],n,u),back:y([a.back,a.front,a],c,!0),front:y([a.front,a.back,a],r,!1)};"auto"===m.axisLabelPosition?(n=function(a,c){return a.visible!==c.visible||
a.visible&&c.visible&&a.frontFacing!==c.frontFacing},m=[],n(a.left,a.front)&&m.push({y:(h+e)/2,x:f,z:0,xDir:{x:1,y:0,z:0}}),n(a.left,a.back)&&m.push({y:(h+e)/2,x:f,z:d,xDir:{x:0,y:0,z:-1}}),n(a.right,a.front)&&m.push({y:(h+e)/2,x:k,z:0,xDir:{x:0,y:0,z:1}}),n(a.right,a.back)&&m.push({y:(h+e)/2,x:k,z:d,xDir:{x:-1,y:0,z:0}}),l=[],n(a.bottom,a.front)&&l.push({x:(f+k)/2,y:e,z:0,xDir:{x:1,y:0,z:0}}),n(a.bottom,a.back)&&l.push({x:(f+k)/2,y:e,z:d,xDir:{x:-1,y:0,z:0}}),t=[],n(a.top,a.front)&&t.push({x:(f+
k)/2,y:h,z:0,xDir:{x:1,y:0,z:0}}),n(a.top,a.back)&&t.push({x:(f+k)/2,y:h,z:d,xDir:{x:-1,y:0,z:0}}),w=[],n(a.bottom,a.left)&&w.push({z:(0+d)/2,y:e,x:f,xDir:{x:0,y:0,z:-1}}),n(a.bottom,a.right)&&w.push({z:(0+d)/2,y:e,x:k,xDir:{x:0,y:0,z:1}}),e=[],n(a.top,a.left)&&e.push({z:(0+d)/2,y:h,x:f,xDir:{x:0,y:0,z:-1}}),n(a.top,a.right)&&e.push({z:(0+d)/2,y:h,x:k,xDir:{x:0,y:0,z:1}}),f=function(a,c,d){if(0===a.length)return null;if(1===a.length)return a[0];for(var b=0,f=A(a,p,!1),e=1;e<f.length;e++)d*f[e][c]>
d*f[b][c]?b=e:d*f[e][c]===d*f[b][c]&&f[e].z<f[b].z&&(b=e);return a[b]},a.axes={y:{left:f(m,"x",-1),right:f(m,"x",1)},x:{top:f(t,"y",-1),bottom:f(l,"y",1)},z:{top:f(e,"y",-1),bottom:f(w,"y",1)}}):a.axes={y:{left:{x:f,z:0,xDir:{x:1,y:0,z:0}},right:{x:k,z:0,xDir:{x:0,y:0,z:1}}},x:{top:{y:h,z:0,xDir:{x:1,y:0,z:0}},bottom:{y:e,z:0,xDir:{x:1,y:0,z:0}}},z:{top:{x:x?k:f,y:h,xDir:x?{x:0,y:0,z:1}:{x:0,y:0,z:-1}},bottom:{x:x?k:f,y:e,xDir:x?{x:0,y:0,z:1}:{x:0,y:0,z:-1}}}};return a};b.Fx.prototype.matrixSetter=
function(){var g;if(1>this.pos&&(b.isArray(this.start)||b.isArray(this.end))){var m=this.start||[1,0,0,1,0,0],a=this.end||[1,0,0,1,0,0];g=[];for(var f=0;6>f;f++)g.push(this.pos*a[f]+(1-this.pos)*m[f])}else g=this.end;this.elem.attr(this.prop,g,null,!0)}})(B);(function(b){function u(d,c,b){if(!d.chart.is3d()||"colorAxis"===d.coll)return c;var e=d.chart,h=A*e.options.chart.options3d.alpha,l=A*e.options.chart.options3d.beta,m=a(b&&d.options.title.position3d,d.options.labels.position3d);b=a(b&&d.options.title.skew3d,
d.options.labels.skew3d);var k=e.frame3d,g=e.plotLeft,n=e.plotWidth+g,q=e.plotTop,v=e.plotHeight+q,e=!1,x=0,z=0,u={x:0,y:1,z:0};c=d.swapZ({x:c.x,y:c.y,z:0});if(d.isZAxis)if(d.opposite){if(null===k.axes.z.top)return{};z=c.y-q;c.x=k.axes.z.top.x;c.y=k.axes.z.top.y;g=k.axes.z.top.xDir;e=!k.top.frontFacing}else{if(null===k.axes.z.bottom)return{};z=c.y-v;c.x=k.axes.z.bottom.x;c.y=k.axes.z.bottom.y;g=k.axes.z.bottom.xDir;e=!k.bottom.frontFacing}else if(d.horiz)if(d.opposite){if(null===k.axes.x.top)return{};
z=c.y-q;c.y=k.axes.x.top.y;c.z=k.axes.x.top.z;g=k.axes.x.top.xDir;e=!k.top.frontFacing}else{if(null===k.axes.x.bottom)return{};z=c.y-v;c.y=k.axes.x.bottom.y;c.z=k.axes.x.bottom.z;g=k.axes.x.bottom.xDir;e=!k.bottom.frontFacing}else if(d.opposite){if(null===k.axes.y.right)return{};x=c.x-n;c.x=k.axes.y.right.x;c.z=k.axes.y.right.z;g=k.axes.y.right.xDir;g={x:g.z,y:g.y,z:-g.x}}else{if(null===k.axes.y.left)return{};x=c.x-g;c.x=k.axes.y.left.x;c.z=k.axes.y.left.z;g=k.axes.y.left.xDir}"chart"!==m&&("flap"===
m?d.horiz?(l=Math.sin(h),h=Math.cos(h),d.opposite&&(l=-l),e&&(l=-l),u={x:g.z*l,y:h,z:-g.x*l}):g={x:Math.cos(l),y:0,z:Math.sin(l)}:"ortho"===m?d.horiz?(u=Math.cos(h),m=Math.sin(l)*u,h=-Math.sin(h),l=-u*Math.cos(l),u={x:g.y*l-g.z*h,y:g.z*m-g.x*l,z:g.x*h-g.y*m},h=1/Math.sqrt(u.x*u.x+u.y*u.y+u.z*u.z),e&&(h=-h),u={x:h*u.x,y:h*u.y,z:h*u.z}):g={x:Math.cos(l),y:0,z:Math.sin(l)}:d.horiz?u={x:Math.sin(l)*Math.sin(h),y:Math.cos(h),z:-Math.cos(l)*Math.sin(h)}:g={x:Math.cos(l),y:0,z:Math.sin(l)});c.x+=x*g.x+z*
u.x;c.y+=x*g.y+z*u.y;c.z+=x*g.z+z*u.z;e=p([c],d.chart)[0];b&&(0>f(p([c,{x:c.x+g.x,y:c.y+g.y,z:c.z+g.z},{x:c.x+u.x,y:c.y+u.y,z:c.z+u.z}],d.chart))&&(g={x:-g.x,y:-g.y,z:-g.z}),d=p([{x:c.x,y:c.y,z:c.z},{x:c.x+g.x,y:c.y+g.y,z:c.z+g.z},{x:c.x+u.x,y:c.y+u.y,z:c.z+u.z}],d.chart),e.matrix=[d[1].x-d[0].x,d[1].y-d[0].y,d[2].x-d[0].x,d[2].y-d[0].y,e.x,e.y],e.matrix[4]-=e.x*e.matrix[0]+e.y*e.matrix[2],e.matrix[5]-=e.x*e.matrix[1]+e.y*e.matrix[3]);return e}var y,v=b.addEvent,q=b.Axis,z=b.Chart,A=b.deg2rad,g=b.each,
n=b.extend,x=b.merge,p=b.perspective,m=b.perspective3D,a=b.pick,f=b.shapeArea,k=b.splat,h=b.Tick,e=b.wrap;x(!0,q.prototype.defaultOptions,{labels:{position3d:"offset",skew3d:!1},title:{position3d:null,skew3d:null}});v(q,"afterSetOptions",function(){var d;this.chart.is3d&&this.chart.is3d()&&"colorAxis"!==this.coll&&(d=this.options,d.tickWidth=a(d.tickWidth,0),d.gridLineWidth=a(d.gridLineWidth,1))});e(q.prototype,"getPlotLinePath",function(a){var c=a.apply(this,[].slice.call(arguments,1));if(!this.chart.is3d()||
"colorAxis"===this.coll||null===c)return c;var d=this.chart,b=d.options.chart.options3d,b=this.isZAxis?d.plotWidth:b.depth,d=d.frame3d,c=[this.swapZ({x:c[1],y:c[2],z:0}),this.swapZ({x:c[1],y:c[2],z:b}),this.swapZ({x:c[4],y:c[5],z:0}),this.swapZ({x:c[4],y:c[5],z:b})],b=[];this.horiz?(this.isZAxis?(d.left.visible&&b.push(c[0],c[2]),d.right.visible&&b.push(c[1],c[3])):(d.front.visible&&b.push(c[0],c[2]),d.back.visible&&b.push(c[1],c[3])),d.top.visible&&b.push(c[0],c[1]),d.bottom.visible&&b.push(c[2],
c[3])):(d.front.visible&&b.push(c[0],c[2]),d.back.visible&&b.push(c[1],c[3]),d.left.visible&&b.push(c[0],c[1]),d.right.visible&&b.push(c[2],c[3]));b=p(b,this.chart,!1);return this.chart.renderer.toLineSegments(b)});e(q.prototype,"getLinePath",function(a){return this.chart.is3d()&&"colorAxis"!==this.coll?[]:a.apply(this,[].slice.call(arguments,1))});e(q.prototype,"getPlotBandPath",function(a){if(!this.chart.is3d()||"colorAxis"===this.coll)return a.apply(this,[].slice.call(arguments,1));var c=arguments,
d=c[2],b=[],c=this.getPlotLinePath(c[1]),d=this.getPlotLinePath(d);if(c&&d)for(var e=0;e<c.length;e+=6)b.push("M",c[e+1],c[e+2],"L",c[e+4],c[e+5],"L",d[e+4],d[e+5],"L",d[e+1],d[e+2],"Z");return b});e(h.prototype,"getMarkPath",function(a){var c=a.apply(this,[].slice.call(arguments,1)),c=[u(this.axis,{x:c[1],y:c[2],z:0}),u(this.axis,{x:c[4],y:c[5],z:0})];return this.axis.chart.renderer.toLineSegments(c)});v(h,"afterGetLabelPosition",function(a){n(a.pos,u(this.axis,a.pos))});e(q.prototype,"getTitlePosition",
function(a){var c=a.apply(this,[].slice.call(arguments,1));return u(this,c,!0)});v(q,"drawCrosshair",function(a){this.chart.is3d()&&"colorAxis"!==this.coll&&a.point&&(a.point.crosshairPos=this.isXAxis?a.point.axisXpos:this.len-a.point.axisYpos)});v(q,"destroy",function(){g(["backFrame","bottomFrame","sideFrame"],function(a){this[a]&&(this[a]=this[a].destroy())},this)});q.prototype.swapZ=function(a,c){return this.isZAxis?(c=c?0:this.chart.plotLeft,{x:c+a.z,y:a.y,z:a.x-c}):a};y=b.ZAxis=function(){this.init.apply(this,
arguments)};n(y.prototype,q.prototype);n(y.prototype,{isZAxis:!0,setOptions:function(a){a=x({offset:0,lineWidth:0},a);q.prototype.setOptions.call(this,a);this.coll="zAxis"},setAxisSize:function(){q.prototype.setAxisSize.call(this);this.width=this.len=this.chart.options.chart.options3d.depth;this.right=this.chart.chartWidth-this.width-this.left},getSeriesExtremes:function(){var b=this,c=b.chart;b.hasVisibleSeries=!1;b.dataMin=b.dataMax=b.ignoreMinPadding=b.ignoreMaxPadding=null;b.buildStacks&&b.buildStacks();
g(b.series,function(d){if(d.visible||!c.options.chart.ignoreHiddenSeries)b.hasVisibleSeries=!0,d=d.zData,d.length&&(b.dataMin=Math.min(a(b.dataMin,d[0]),Math.min.apply(null,d)),b.dataMax=Math.max(a(b.dataMax,d[0]),Math.max.apply(null,d)))})}});v(z,"afterGetAxes",function(){var a=this,c=this.options,c=c.zAxis=k(c.zAxis||{});a.is3d()&&(this.zAxis=[],g(c,function(c,b){c.index=b;c.isX=!0;(new y(a,c)).setScale()}))});e(q.prototype,"getSlotWidth",function(b,c){if(this.chart.is3d()&&c&&c.label&&this.categories&&
this.chart.frameShapes){var d=this.chart,e=this.ticks,f=this.gridGroup.element.childNodes[0].getBBox(),h=d.frameShapes.left.getBBox(),g=d.options.chart.options3d,d={x:d.plotWidth/2,y:d.plotHeight/2,z:g.depth/2,vd:a(g.depth,1)*a(g.viewDistance,0)},k,n,g=c.pos,p=e[g-1],e=e[g+1];0!==g&&p&&p.label.xy&&(k=m({x:p.label.xy.x,y:p.label.xy.y,z:null},d,d.vd));e&&e.label.xy&&(n=m({x:e.label.xy.x,y:e.label.xy.y,z:null},d,d.vd));e={x:c.label.xy.x,y:c.label.xy.y,z:null};e=m(e,d,d.vd);return Math.abs(k?e.x-k.x:
n?n.x-e.x:f.x-h.x)}return b.apply(this,[].slice.call(arguments,1))})})(B);(function(b){var u=b.addEvent,y=b.perspective,v=b.pick;u(b.Series,"afterTranslate",function(){this.chart.is3d()&&this.translate3dPoints()});b.Series.prototype.translate3dPoints=function(){var b=this.chart,u=v(this.zAxis,b.options.zAxis[0]),A=[],g,n,x;for(x=0;x<this.data.length;x++)g=this.data[x],u&&u.translate?(n=u.isLog&&u.val2lin?u.val2lin(g.z):g.z,g.plotZ=u.translate(n),g.isInside=g.isInside?n>=u.min&&n<=u.max:!1):g.plotZ=
0,g.axisXpos=g.plotX,g.axisYpos=g.plotY,g.axisZpos=g.plotZ,A.push({x:g.plotX,y:g.plotY,z:g.plotZ});b=y(A,b,!0);for(x=0;x<this.data.length;x++)g=this.data[x],u=b[x],g.plotX=u.x,g.plotY=u.y,g.plotZ=u.z}})(B);(function(b){function u(b){var a=b.apply(this,[].slice.call(arguments,1));this.chart.is3d&&this.chart.is3d()&&(a.stroke=this.options.edgeColor||a.fill,a["stroke-width"]=z(this.options.edgeWidth,1));return a}var y=b.addEvent,v=b.each,q=b.perspective,z=b.pick,A=b.Series,g=b.seriesTypes,n=b.inArray,
x=b.svg,p=b.wrap;p(g.column.prototype,"translate",function(b){b.apply(this,[].slice.call(arguments,1));this.chart.is3d()&&this.translate3dShapes()});p(b.Series.prototype,"alignDataLabel",function(b){arguments[3].outside3dPlot=arguments[1].outside3dPlot;b.apply(this,[].slice.call(arguments,1))});p(b.Series.prototype,"justifyDataLabel",function(b){return arguments[2].outside3dPlot?!1:b.apply(this,[].slice.call(arguments,1))});g.column.prototype.translate3dPoints=function(){};g.column.prototype.translate3dShapes=
function(){var b=this,a=b.chart,f=b.options,g=f.depth||25,h=(f.stacking?f.stack||0:b.index)*(g+(f.groupZPadding||1)),e=b.borderWidth%2?.5:0;a.inverted&&!b.yAxis.reversed&&(e*=-1);!1!==f.grouping&&(h=0);h+=f.groupZPadding||1;v(b.data,function(d){d.outside3dPlot=null;if(null!==d.y){var c=d.shapeArgs,f=d.tooltipPos,k;v([["x","width"],["y","height"]],function(a){k=c[a[0]]-e;0>k&&(c[a[1]]+=c[a[0]]+e,c[a[0]]=-e,k=0);k+c[a[1]]>b[a[0]+"Axis"].len&&0!==c[a[1]]&&(c[a[1]]=b[a[0]+"Axis"].len-c[a[0]]);if(0!==
c[a[1]]&&(c[a[0]]>=b[a[0]+"Axis"].len||c[a[0]]+c[a[1]]<=e)){for(var f in c)c[f]=0;d.outside3dPlot=!0}});d.shapeType="cuboid";c.z=h;c.depth=g;c.insidePlotArea=!0;f=q([{x:f[0],y:f[1],z:h}],a,!0)[0];d.tooltipPos=[f.x,f.y]}});b.z=h};p(g.column.prototype,"animate",function(b){if(this.chart.is3d()){var a=arguments[1],f=this.yAxis,g=this,h=this.yAxis.reversed;x&&(a?v(g.data,function(a){null!==a.y&&(a.height=a.shapeArgs.height,a.shapey=a.shapeArgs.y,a.shapeArgs.height=1,h||(a.shapeArgs.y=a.stackY?a.plotY+
f.translate(a.stackY):a.plotY+(a.negative?-a.height:a.height)))}):(v(g.data,function(a){null!==a.y&&(a.shapeArgs.height=a.height,a.shapeArgs.y=a.shapey,a.graphic&&a.graphic.animate(a.shapeArgs,g.options.animation))}),this.drawDataLabels(),g.animate=null))}else b.apply(this,[].slice.call(arguments,1))});p(g.column.prototype,"plotGroup",function(b,a,f,g,h,e){this.chart.is3d()&&e&&!this[a]&&(this.chart.columnGroup||(this.chart.columnGroup=this.chart.renderer.g("columnGroup").add(e)),this[a]=this.chart.columnGroup,
this.chart.columnGroup.attr(this.getPlotBox()),this[a].survive=!0);return b.apply(this,Array.prototype.slice.call(arguments,1))});p(g.column.prototype,"setVisible",function(b,a){var f=this,g;f.chart.is3d()&&v(f.data,function(b){g=(b.visible=b.options.visible=a=void 0===a?!b.visible:a)?"visible":"hidden";f.options.data[n(b,f.data)]=b.options;b.graphic&&b.graphic.attr({visibility:g})});b.apply(this,Array.prototype.slice.call(arguments,1))});g.column.prototype.handle3dGrouping=!0;y(A,"afterInit",function(){if(this.chart.is3d()&&
this.handle3dGrouping){var b=this.options,a=b.grouping,f=b.stacking,g=z(this.yAxis.options.reversedStacks,!0),h=0;if(void 0===a||a){a=this.chart.retrieveStacks(f);h=b.stack||0;for(f=0;f<a[h].series.length&&a[h].series[f]!==this;f++);h=10*(a.totalStacks-a[h].position)+(g?f:-f);this.xAxis.reversed||(h=10*a.totalStacks-h)}b.zIndex=h}});p(g.column.prototype,"pointAttribs",u);g.columnrange&&(p(g.columnrange.prototype,"pointAttribs",u),g.columnrange.prototype.plotGroup=g.column.prototype.plotGroup,g.columnrange.prototype.setVisible=
g.column.prototype.setVisible);p(A.prototype,"alignDataLabel",function(b){if(this.chart.is3d()&&("column"===this.type||"columnrange"===this.type)){var a=arguments,f=a[4],a=a[1],g={x:f.x,y:f.y,z:this.z},g=q([g],this.chart,!0)[0];f.x=g.x;f.y=a.outside3dPlot?-9E9:g.y}b.apply(this,[].slice.call(arguments,1))});p(b.StackItem.prototype,"getStackBox",function(g,a){var f=g.apply(this,[].slice.call(arguments,1));if(a.is3d()){var k={x:f.x,y:f.y,z:0},k=b.perspective([k],a,!0)[0];f.x=k.x;f.y=k.y}return f})})(B);
(function(b){var u=b.deg2rad,y=b.each,v=b.pick,q=b.seriesTypes,z=b.svg;b=b.wrap;b(q.pie.prototype,"translate",function(b){b.apply(this,[].slice.call(arguments,1));if(this.chart.is3d()){var g=this,n=g.options,q=n.depth||0,p=g.chart.options.chart.options3d,m=p.alpha,a=p.beta,f=n.stacking?(n.stack||0)*q:g._i*q,f=f+q/2;!1!==n.grouping&&(f=0);y(g.data,function(b){var h=b.shapeArgs;b.shapeType="arc3d";h.z=f;h.depth=.75*q;h.alpha=m;h.beta=a;h.center=g.center;h=(h.end+h.start)/2;b.slicedTranslation={translateX:Math.round(Math.cos(h)*
n.slicedOffset*Math.cos(m*u)),translateY:Math.round(Math.sin(h)*n.slicedOffset*Math.cos(m*u))}})}});b(q.pie.prototype.pointClass.prototype,"haloPath",function(b){var g=arguments;return this.series.chart.is3d()?[]:b.call(this,g[1])});b(q.pie.prototype,"pointAttribs",function(b,g,n){b=b.call(this,g,n);n=this.options;this.chart.is3d()&&(b.stroke=n.edgeColor||g.color||this.color,b["stroke-width"]=v(n.edgeWidth,1));return b});b(q.pie.prototype,"drawPoints",function(b){b.apply(this,[].slice.call(arguments,
1));this.chart.is3d()&&y(this.points,function(b){var g=b.graphic;if(g)g[b.y&&b.visible?"show":"hide"]()})});b(q.pie.prototype,"drawDataLabels",function(b){if(this.chart.is3d()){var g=this.chart.options.chart.options3d;y(this.data,function(b){var n=b.shapeArgs,p=n.r,m=(n.start+n.end)/2,a=b.labelPos,f=-p*(1-Math.cos((n.alpha||g.alpha)*u))*Math.sin(m),k=p*(Math.cos((n.beta||g.beta)*u)-1)*Math.cos(m);y([0,2,4],function(b){a[b]+=k;a[b+1]+=f})})}b.apply(this,[].slice.call(arguments,1))});b(q.pie.prototype,
"addPoint",function(b){b.apply(this,[].slice.call(arguments,1));this.chart.is3d()&&this.update(this.userOptions,!0)});b(q.pie.prototype,"animate",function(b){if(this.chart.is3d()){var g=arguments[1],n=this.options.animation,q=this.center,p=this.group,m=this.markerGroup;z&&(!0===n&&(n={}),g?(p.oldtranslateX=p.translateX,p.oldtranslateY=p.translateY,g={translateX:q[0],translateY:q[1],scaleX:.001,scaleY:.001},p.attr(g),m&&(m.attrSetters=p.attrSetters,m.attr(g))):(g={translateX:p.oldtranslateX,translateY:p.oldtranslateY,
scaleX:1,scaleY:1},p.animate(g,n),m&&m.animate(g,n),this.animate=null))}else b.apply(this,[].slice.call(arguments,1))})})(B);(function(b){var u=b.Point,y=b.seriesType,v=b.seriesTypes;y("scatter3d","scatter",{tooltip:{pointFormat:"x: \x3cb\x3e{point.x}\x3c/b\x3e\x3cbr/\x3ey: \x3cb\x3e{point.y}\x3c/b\x3e\x3cbr/\x3ez: \x3cb\x3e{point.z}\x3c/b\x3e\x3cbr/\x3e"}},{pointAttribs:function(q){var u=v.scatter.prototype.pointAttribs.apply(this,arguments);this.chart.is3d()&&q&&(u.zIndex=b.pointCameraDistance(q,
this.chart));return u},axisTypes:["xAxis","yAxis","zAxis"],pointArrayMap:["x","y","z"],parallelArrays:["x","y","z"],directTouch:!0},{applyOptions:function(){u.prototype.applyOptions.apply(this,arguments);void 0===this.z&&(this.z=0);return this}})})(B);(function(b){var u=b.addEvent,y=b.Axis,v=b.SVGRenderer,q=b.VMLRenderer;q&&(b.setOptions({animate:!1}),q.prototype.face3d=v.prototype.face3d,q.prototype.polyhedron=v.prototype.polyhedron,q.prototype.cuboid=v.prototype.cuboid,q.prototype.cuboidPath=v.prototype.cuboidPath,
q.prototype.toLinePath=v.prototype.toLinePath,q.prototype.toLineSegments=v.prototype.toLineSegments,q.prototype.createElement3D=v.prototype.createElement3D,q.prototype.arc3d=function(b){b=v.prototype.arc3d.call(this,b);b.css({zIndex:b.zIndex});return b},b.VMLRenderer.prototype.arc3dPath=b.SVGRenderer.prototype.arc3dPath,u(y,"render",function(){this.sideFrame&&(this.sideFrame.css({zIndex:0}),this.sideFrame.front.attr({fill:this.sideFrame.color}));this.bottomFrame&&(this.bottomFrame.css({zIndex:1}),
this.bottomFrame.front.attr({fill:this.bottomFrame.color}));this.backFrame&&(this.backFrame.css({zIndex:0}),this.backFrame.front.attr({fill:this.backFrame.color}))}))})(B)});
//# sourceMappingURL=highcharts-3d.js.map
