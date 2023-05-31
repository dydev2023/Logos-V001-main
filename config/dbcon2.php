<?
$host='localhost';
$user='iater01';
$dbpass='iATER2020';
$dbname='iater01';


$sock = mysqli_connect($host,$user,$dbpass);
$db = mysqli_select_db($sock, $dbname);  

if(!$db) {
echo "Unable to connect to DB.";
?>
<script>
window.alert("Unable to connect to DB.");
self.location="index.php";
</script>
<?
die;}

?>