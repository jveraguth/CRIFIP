<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>
        
		<footer role="contentinfo" class="sixcol gutterXL">
<?php
	get_sidebar( 'footer' );
?>
			<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</footer><!-- footer -->
        </div><!--end row-->
</div><!--end container-->
</div><!--end quoi??-->
<script type="text/javascript" src="<?php echo home_url( '/' ); ?>js/Chart.min.js"></script>
<script type="text/javascript" src="<?php echo home_url( '/' ); ?>js/jquery.inview.min.js"></script>
<script type="text/javascript" src="<?php echo home_url( '/' ); ?>js/intro.min.js"></script>
<script type="text/javascript" src="<?php echo home_url( '/' ); ?>js/plugins.js"></script>
    <script type="text/javascript">
      document.getElementById('startButton').onclick = function() {
        introJs().setOption('doneLabel', 'Next page').start().oncomplete(function() {
          window.location.href = 'second.html?multipage=true';
        });
      };
    </script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>


<?php
	wp_footer();
?>
	
	</body>
</html>