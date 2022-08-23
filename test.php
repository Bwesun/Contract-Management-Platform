<link rel="stylesheet" type="text/css" href="bootstrap.fmin.css">
<!--<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Roboto:400);

$blue: #0097bf;
$white: #fff;
$black: #000;
$text: #424242;

@mixin cf {
	&:before,
	&:after {
		content: '';
		display: table;
	}

	&:after {
		clear: both;
	}
}

body {
  font-family: 'Roboto', sans-serif;;
}

.header {
	max-width: 720px;
	margin: 2em auto 10em;
}

.header-nav {
	@include cf;
	position: relative;
	padding-right: 3em;
}

.menu {
	display: inline-block;
	float: right;
	list-style-type: none;
	margin: 0;
	padding: 0;

	li {
		display: inline-block;

		a {
			color: $blue;
			display: block;
			padding: 10px;
			position: relative;
			transition: color 0.3s;
			text-decoration: none;
		}
	}
}

.search-button {
	position: absolute;
	right: 20px;
	top: 50%;
	transform: translate(0,-50%);
}

.search-toggle {
	position: relative;
	display: block;
	height: 10px;
	width: 10px;

	&::before,
	&::after {
		content: '';
		position: absolute;
		display: block;
		transition: all 0.1s;
	}

	&::before {
		border: 2px solid $blue;
		border-radius: 50%;
		width: 100%;
		height: 100%;
		left: -2px;
		top: -2px;
	}

	&::after {
		height: 2px;
		width: 7px;
		background: $blue;
		top: 10px;
		left: 8px;
		transform: rotate(45deg);
	}

	&.active {
		
		&::before{
			width: 0;
			border-width: 1px;
			border-radius: 0;
			transform: rotate(45deg);
			top: -1px;
			left: 4px;
		}

		&::after {
			width: 12px;
			left: -1px;
			top: 4px;
		}
	}
}

.search-input {

	&:focus {
		outline: none;
	}
}


#header-1 {
	border-bottom: 2px solid $blue;

	.search-box {
		position: absolute;
		bottom: 0;
		width: 100%;
		height: 100%;
		max-height: 0;
		transform: translateY(100%);
		background-color: $blue;
		transition: all 0.3s;

		.search-input {
			width: 100%;
			height: 100%;
			padding: 0 1em;
			border: 0;
			background-color: transparent;
			opacity: 0;
      color: $white;

			&::-webkit-input-placeholder {
				color: rgba($white, 0.4);
			}
		}
	}

	&.show {

		.search-box {
			max-height: 40px;

			.search-input {
				opacity: 1;
			}
		}
	}
}

#header-2 {
	overflow: hidden;

	.menu {

		li {
			opacity: 1;
			transition: transform 0.3s, opacity 0.2s 0.1s;

			$time-offset: 0.3;
			@for $i from 1 through 5 {
				&:nth-child(#{$i}) {
					$time-offset: $time-offset + 0.1;
					transition-delay: #{$time-offset}s;
				}
			}
		}
	}

	.search-box {
		position: absolute;
		left: 0;
		height: 100%;
    width: 0;
		padding-left: 2em;
		transform: translateX(20%);
		opacity: 0;
		transition: all 0.4s 0.3s;

		.search-input {
			border: 0;
			width: 100%;
			height: 100%;
			background-color: transparent;
		}

		.search-toggle {
			width: 14px;
			height: 14px;
			padding: 0;
			position: absolute;
			left: 5px;
			top: 50%;
			transform: translateY(-50%);
		}
	}

	&.show {

		.menu {

			li {
				transform: scale(0.8);
				opacity: 0;
			}
		}

		.search-box {
			width: calc(100% - 5em);
			transform: translateX(0);
			opacity: 1;
		}
	}
}

#header-3 {

	.menu {

		li {
			opacity: 1;
			transition: all 0.3s 0.3s;
		}
	}

	.search-box {
		position: absolute;
		right: 48px;
		height: 100%;
		width: 0;
		padding: 0;
		opacity: 0;
		transition: all 0.3s;

		.search-input {
			border: 0;
			width: 100%;
			height: 100%;
			background-color: transparent;
		}

		.search-toggle {
			width: 14px;
			height: 14px;
			padding: 0;
			position: absolute;
			left: 5px;
			top: 50%;
			transform: translateY(-50%);
		}
	}

	&.show {

		.menu {

			li {
				opacity: 0;
				transition: all 0.3s;

				&:nth-child(even) {
					transform: translateY(-100%);
				}

				&:nth-child(odd) {
					transform: translateY(100%);
				}
			}
		}

		.search-box {
			width: calc(100% - 5em);
			opacity: 1;
			transition: all 0.3s 0.3s;
		}
	}
}

</style>
<body translate="no">
<header id="header-1" class="header">
<nav class="header-nav">
<div class="search-button">
<a href="#" class="search-toggle" data-selector="#header-1"></a>
</div>
<ul class="menu">
<li><a href="#">For Business</a></li>
<li><a href="#">For Personal</a></li>
<li><a href="#">Pricing</a></li>
<li><a href="#">About</a></li>
<li><a href="#">Contact</a></li>
</ul>
<form action="" class="search-box">
<input type="text" class="text search-input" placeholder="Type here to search...">
</form>
</nav>
</header>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
<script src="jquery.min.js"></script>
<script id="rendered-js">
$('.header').on('click', '.search-toggle', function (e) {
  var selector = $(this).data('selector');

  $(selector).toggleClass('show').find('.search-input').focus();
  $(this).toggleClass('active');

  e.preventDefault();
});
//# sourceURL=pen.js
    </script>


</body>


<script type="text/javascript">
	$('.header').on('click', '.search-toggle', function(e) {
  var selector = $(this).data('selector');

  $(selector).toggleClass('show').find('.search-input').focus();
  $(this).toggleClass('active');

  e.preventDefault();
});
</script>








<h1>No. 1</h1>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Inconsolata:700');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  width: 100%;
  height: 100%;
}

body {
  background:;
}

.container {
  position: absolute;
  margin: auto;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 300px;
  height: 100px;
  .search {
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 80px;
    height: 80px;
    background: crimson;
    border-radius: 50%;
    transition: all 1s;
    z-index: 4;
    box-shadow: 0 0 25px 0 rgba(0, 0, 0, 0.4);
    // box-shadow: 0 0 25px 0 crimson;
    &:hover {
      cursor: pointer;
    }
    &::before {
      content: "";
      position: absolute;
      margin: auto;
      top: 22px;
      right: 0;
      bottom: 0;
      left: 22px;
      width: 12px;
      height: 2px;
      background: white;
      transform: rotate(45deg);
      transition: all .5s;
    }
    &::after {
      content: "";
      position: absolute;
      margin: auto;
      top: -5px;
      right: 0;
      bottom: 0;
      left: -5px;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      border: 2px solid white;
      transition: all .5s;
    }
  }
  input {
    font-family: 'Inconsolata', monospace;
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 50px;
    outline: none;
    border: none;
    // border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    background: crimson;
    color: white;
    text-shadow: 0 0 10px crimson;
    padding: 0 80px 0 20px;
    border-radius: 30px;
    box-shadow: 0 0 25px 0 crimson,
                0 20px 25px 0 rgba(0, 0, 0, 0.2);
    // box-shadow: inset 0 0 25px 0 rgba(0, 0, 0, 0.5);
    transition: all 1s;
    opacity: 0;
    z-index: 5;
    font-weight: bolder;
    letter-spacing: 0.1em;
    &:hover {
      cursor: pointer;
    }
    &:focus {
      width: 300px;
      opacity: 1;
      cursor: text;
    }
    &:focus ~ .search {
      right: -250px;
      background: #151515;
      z-index: 6;
      &::before {
        top: 0;
        left: 0;
        width: 25px;
      }
      &::after {
        top: 0;
        left: 0;
        width: 25px;
        height: 2px;
        border: none;
        background: white;
        border-radius: 0%;
        transform: rotate(-45deg);
      }
    }
    &::placeholder {
      color: white;
      opacity: 0.5;
      font-weight: bolder;
    }
  }
}

</style>

<div class="container">
  <input type="text" placeholder="Search...">
  <div class="search"></div>
</div>








<br>


<h1>No. 2</h1>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #00B4CC;
  border-right: none;
  padding: 5px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>

<div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>








<br>
<h1>No. 3</h1>

<style type="text/css">
	$background-color: #2A2E37;
$search-bg-color: #242628;
$icon-color: #00FEDE;
$transition: all .5s ease;
* {
  box-sizing: border-box;
}

body {
  background: $background-color;
}

.search {
  width: 100px;
  height: 100px;
  margin: 40px auto 0;
  background-color: $search-bg-color;
  position: relative;
  overflow: hidden;
  transition: $transition;
  &:before {
    content: '';
    display: block;
    width: 3px;
    height: 100%;
    position: relative;
    background-color: $icon-color;
    transition: $transition;
  }
  &.open {
    width: 420px;
    &:before {
      height: 60px;
      margin: 20px 0 20px 30px;
      position: absolute;
    }
  }
}

.search-box {
  width: 100%;
  height: 100%;
  box-shadow: none;
  border: none;
  background: transparent;
  color: #fff;
  padding: 20px 100px 20px 45px;
  font-size: 40px;
  &:focus {
    outline: none;
  }
}

.search-button {
  width: 100px;
  height: 100px;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
  padding: 20px;
  cursor: pointer;
}

.search-icon {
  width: 40px;
  height: 40px;
  border-radius: 40px;
  border: 3px solid $icon-color;
  display: block;
  position: relative;
  margin-left: 5px;
  transition: $transition;
  &:before {
    content: '';
    width: 3px;
    height: 15px;
    position: absolute;
    right: -2px;
    top: 30px;
    display: block;
    background-color: $icon-color;
    transform: rotate(-45deg);
    transition: $transition;
  }
  &:after {
    content: '';
    width: 3px;
    height: 15px;
    position: absolute;
    right: -12px;
    top: 40px;
    display: block;
    background-color: $icon-color;
    transform: rotate(-45deg);
    transition: $transition;
  }
  .open & {
    margin: 0;
    width: 60px;
    height: 60px;
    border-radius: 60px;
    &:before {
      transform: rotate(52deg);
      right: 22px;
      top: 23px;
      height: 18px;
    }
    &:after {
      transform: rotate(-230deg);
      right: 22px;
      top: 13px;
      height: 18px;
    }
  }
}
</style>

<div class="search">
  <input type="search" class="search-box" />
  <span class="search-button">
    <span class="search-icon"></span>
  </span>
</div>

<script>
	$('.search-button').click(function(){
  $(this).parent().toggleClass('open');
});
</script>




<br>





<h1>No. 4</h1>

<style type="text/css">
	/*** COLORS ***/
@bg-color: #913D88;
@txt-color: #FFFFFF;
@icn-color: #FFFFFF;

/*** DEMO ***/
html,body{height:100%;margin:0;}body{background:@bg-color;font:13px monospace;color:@txt-color}p{margin-top:30px}.cntr{display:table;width:100%;height:100%;.cntr-innr{display:table-cell;text-align:center;vertical-align:middle}}

/*** STYLES ***/
.search {
	display: inline-block;
	position: relative;
	height: 35px;
	width: 35px;
	box-sizing: border-box;
	margin: 0px 8px 7px 0px;
	padding: 7px 9px 0px 9px;
	border: 3px solid @icn-color;
	border-radius: 25px;
	transition: all 200ms ease;
	cursor: text;
	
	&:after {
		content: "";
		position: absolute;
		width: 3px;
		height: 20px;
		right: -5px;
		top: 21px;
		background: @icn-color;
		border-radius: 3px;
		transform: rotate(-45deg);
		transition: all 200ms ease;
	}
	
	&.active,
	&:hover {
		width: 200px;
		margin-right: 0px;
		
		&:after {
			height: 0px;	
		}
	}
	
	input {
		width: 100%;
		border: none;
		box-sizing: border-box;
		font-family: Helvetica;
		font-size: 15px;
		color: inherit;
		background: transparent;
		outline-width: 0px;
	}
}

</style>

<div class="cntr">
	<div class="cntr-innr">
	  <label class="search" for="inpt_search">
			<input id="inpt_search" type="text" />
		</label>
		<p>Hover to see the magic.</p>
	</div>
</div>

<script>
	$("#inpt_search").on('focus', function () {
	$(this).parent('label').addClass('active');
});

$("#inpt_search").on('blur', function () {
	if($(this).val().length == 0)
		$(this).parent('label').removeClass('active');
});
</script>
-->


<h1>No 5</h1>
<style type="text/css">
	*
{
    outline: none;
}

html, body
{
    height: 100%;
    min-height: 100%;
}

body
{
    margin: 0;
    background-color: #ffd8d8;
}

.tb
{
    display: table;
    width: 100%;
}

.td
{
    display: table-cell;
    vertical-align: middle;
}

input, button
{
    color: #fff;
    font-family: Nunito;
    padding: 0;
    margin: 0;
    border: 0;
    background-color: transparent;
}

#cover
{
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    width: 550px;
    padding: 35px;
    margin: -83px auto 0 auto;
    background-color: #ff7575;
    border-radius: 20px;
    box-shadow: 0 10px 40px #ff7c7c, 0 0 0 20px #ffffffeb;
    transform: scale(0.6);
}

form
{
    height: 96px;
}

input[type="text"]
{
    width: 100%;
    height: 96px;
    font-size: 60px;
    line-height: 1;
}

input[type="text"]::placeholder
{
    color: #e16868;
}

#s-cover
{
    width: 1px;
    padding-left: 35px;
}

button
{
    position: relative;
    display: block;
    width: 84px;
    height: 96px;
    cursor: pointer;
}

#s-circle
{
    position: relative;
    top: -8px;
    left: 0;
    width: 43px;
    height: 43px;
    margin-top: 0;
    border-width: 15px;
    border: 15px solid #fff;
    background-color: transparent;
    border-radius: 50%;
    transition: 0.5s ease all;
}

button span
{
    position: absolute;
    top: 68px;
    left: 43px;
    display: block;
    width: 45px;
    height: 15px;
    background-color: transparent;
    border-radius: 10px;
    transform: rotateZ(52deg);
    transition: 0.5s ease all;
}

button span:before, button span:after
{
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    width: 45px;
    height: 15px;
    background-color: #fff;
    border-radius: 10px;
    transform: rotateZ(0);
    transition: 0.5s ease all;
}

#s-cover:hover #s-circle
{
    top: -1px;
    width: 67px;
    height: 15px;
    border-width: 0;
    border-radius: 20px;
}

#s-cover:hover span
{
    top: 50%;
    left: 56px;
    width: 25px;
    margin-top: -9px;
    transform: rotateZ(0);
}

#s-cover:hover button span:before
{
    bottom: 11px;
    transform: rotateZ(52deg);
}

#s-cover:hover button span:after
{
    bottom: -11px;
    transform: rotateZ(-52deg);
}
#s-cover:hover button span:before, #s-cover:hover button span:after
{
    right: -6px;
    width: 40px;
    background-color: #ccc;
}
</style>
    <div class="tb">
      <div class="td">
      	<input type="text" placeholder="Search" required>
      </div>
      <div class="td" id="s-cover">
        <button type="submit">
          <div id="s-circle"></div>
          <span></span>
        </button>
      </div>
    </div>