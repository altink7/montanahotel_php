<?php
$page = basename($_SERVER['PHP_SELF'], '.php');
include 'components/head.php';
include 'components/nav.php';
include 'components/banner.php';


$button = '<span class="col-5 social"><a id="submitButton" class="reservation"
 href="'.(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ?"reservation.php":"login.php").'"><input type="button" value="Buchen"></a> </span>';
 
?>
    <!--Section 1 start-->
	<section>
        <div class="row">
        <div class="col-lg-1"></div>
			<div class="col-lg-5">
				<div class="room-image">
					<img class = roomimg src="img/room1.png">
				</div>
            </div>
            <div class="col-lg-1"></div>
			<div class="col-lg-4 contentroom btn-group-vertical">
				<h2 class="content-title">Mountain Sweet</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>	
				<ul class="list-group list-group-horizontal-sm">
					<li class="list-group-item">45 m²</li>
					<li class="list-group-item">Queen-size Bett</li>
					<li class="list-group-item">Bad, WC, Safe, TV</li>
				</ul>
				<div class="content-footer">
					<div class="row">
					<?php echo $button; ?>
						<span class="col-7 social text-end">€ 100 / Nacht</span>
					</div>
				</div>
			</div>
            <div class="col-lg-1"></div>
		</div>

        <div class="row">
            <div class="col-lg-1"></div>
			<div class="col-lg-5">
				<div class="room-image">
					<img class = roomimg src="img/room2.png">
				</div>
            </div>
            <div class="col-lg-1"></div>
			<div class="col-lg-4 contentroom btn-group-vertical">
				<h2 class="content-title">Ozean Sweet</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>	
				<ul class="list-group list-group-horizontal-sm">
					<li class="list-group-item">50 m²</li>
					<li class="list-group-item">King-size Bett</li>
					<li class="list-group-item">Bad, WC, Safe, TV</li>
				</ul>
				<div class="content-footer">
					<div class="row">
					<?php echo $button; ?>
						<span class="col-7 social text-end">€ 120 / Nacht</span>
					</div>
				</div>
			</div>
            <div class="col-lg-1"></div>
		</div>
    
    <div class="row">
        <div class="col-lg-1"></div>
			<div class="col-lg-5">
				<div class="room-image">
					<img class = roomimg src="img/room3.png">
				</div>
            </div>
            <div class="col-lg-1"></div>
			<div class="col-lg-4 contentroom btn-group-vertical">
				<h2 class="content-title">Deluxe Villa</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>	
				<ul class="list-group list-group-horizontal-sm">
					<li class="list-group-item">120 m²</li>
					<li class="list-group-item">King-size Betten (3x)</li>
					<li class="list-group-item">Bad, WC, Safe, TV, Pool</li>
				</ul>
				<div class="content-footer">
					<div class="row">
					<?php echo $button; ?>
						<span class="col-7 social text-end">€ 300 / Nacht</span>
					</div>
				</div>
			</div>
            <div class="col-lg-1"></div>
		</div>

        <div class="row">
            <div class="col-lg-1"></div>
			<div class="col-lg-5">
				<div class="room-image">
					<img class = roomimg src="img/room4.png">
				</div>
            </div>
            <div class="col-lg-1"></div>
			<div class="col-lg-4 contentroom btn-group-vertical">
				<a name="mountainsweet"></a>
				<h2 class="content-title">Ozean Villa</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>	
				<ul class="list-group list-group-horizontal-sm">
					<li class="list-group-item">70 m²</li>
					<li class="list-group-item">King-size Bett (2x)</li>
					<li class="list-group-item">Bad, WC, Safe, TV, Pool</li>
				</ul>
				<div class="content-footer">
					<div class="row">
					<?php echo $button; ?>
						<span class="col-7 social text-end">€ 200 / Nacht</span>
					</div>
				</div>
			</div>
            <div class="col-lg-1"></div>
		</div>
    
    <!--Section 1 end-->
  
    <?php
    include 'components/footer.php';
    ?>