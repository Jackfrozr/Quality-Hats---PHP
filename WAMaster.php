    <script src="WABootstrap/bootstrap.js" type="text/javascript">
	</script>
     <script src="WABootstrap/jquery-1.10.2.js" type="text/javascript">
	</script>
    <script src="WABootstrap/modernizr-2.6.2.js" type="text/javascript">
	</script>
    <script src="WABootstrap/respond.js" type="text/javascript">
	</script>
    <?php 	
		session_start(); //starting session
	?>

<!-- Navigation bar-->
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
    <!--Collapse button-->
    <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" runat="server" href="index.php?content_page=Introduction"><img src="WAImages/logo.png" alt="logo" style="max-width:100%;max-height: 100%"></a>
    </div>
    <!--links-->
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li>
					<a runat="server" href="index.php?content_page=Hat">Hats</a>
				</li>
				<li>
					<a runat="server" href="index.php?content_page=Category">Category</a>
				</li>
				<li>
					<a runat="server" href="index.php?content_page=Supplier">Supplier</a></li>
				<li>
					<a runat="server" href="index.php?content_page=About">About</a>
				</li>
				<li>
					<a runat="server" href="index.php?content_page=Contact">Contact</a>
				</li>
				<?php 
					//If admin
					session_start(); 
					if($_SESSION['admin'] == true)
					{
						
						echo '
						<li>
							<a runat="server" href="index.php?content_page=Member">Customer</a>
						</li>';
						echo '
						<li>
							<a runat="server" href="index.php?content_page=OrderAdmin">Order</a>
						</li>';
					}
					else
					{
						echo '
						<li>
						<a runat="server" href="index.php?content_page=php-shopping/cart">Shopping Cart</a>
						</li>';	
						if($_SESSION['flag'] == true)
						{
							echo '
							<li>
								<a runat="server" href="index.php?content_page=Order">Order</a>
							</li>';
						}
					}
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<?php
					
					if($_SESSION['current_user']=="")
					{

					}
					else
					{
						echo "<a>Hello " . $_SESSION['current_user'] . "!</a>";
					}
					?>
				</li>
				<li>
					<a runat="server" href="index.php?content_page=Register">Register</a>
				</li>
				<li>
					<?php
					if($_SESSION['current_user']=="")
					{
						echo '<a runat="server" href="index.php?content_page=Login">Login</a>';
					}
					else
					{
						echo '<a runat="server" href="index.php?content_page=Logoff">Log Off</a>';	
					}
					?>
				</li>
			</ul>
		</div>
    </div>
    </div>    
    
    
    
 <div id="header">
 <div id="logo" onClick="location.href='index.php?content_page=Introduction'">
 </div>
 </div>
 <!-- The body area -->
 <div><?php include($page_content);?></div> 
 
  <!-- Footer -->
  <div style="position: fixed; bottom: 0px; left:0px;">
  </div>
  <div style="position: fixed; bottom: 0px; right:0px;">
  &copy;2017 Fu Jantzen
  </div>
