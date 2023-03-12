import './App.css';
import './index.php';

function App() {

  function gettime(){
  const d = new Date();
  let year = d.getUTCFullYear();
  let month = d.getUTCMonth();
  let day = d.getUTCDate();
  let hour = d.getUTCHours();
  let minutes = d.getUTCMinutes();
  let seconds = d.getUTCSeconds();

  let timestamp = year + "-" + month + "-" + day + " " + hour + "-" + minutes + "-" + seconds;
  document.cookie = "timestamp = " + timestamp;
  }
  console.log(gettime());

  return (
    <>
    <div className="App">
      <form action='./index.php' className='send_file' method='post' enctype="multipart/form-data"> 
        <label htmlFor='owner_name'>Owner name</label>
        <input type = "text" className='owner_name' name='name' required></input>
        <label htmlFor='file_timer'>Set file time period</label>
        <select className='file_timer' name='timeperiod' required>
          <option value="5">5 mins</option>
          <option value="10">10 mins</option>
          <option value="30">30 mins</option>
          <option value="60">1 hr</option>
          <option value="180">3 hrs</option>
          <option value="360">6 hrs</option>
          <option value="720">12 hrs</option>
          <option value="1440">1 day</option>
        </select>
        <label htmlFor='upload_file'>Upload Files</label>
        <input type="file" className='upload_file' name='upload_file[]' multiple ></input>
        <input type="checkbox" className='acknowledgement' value="agree" required></input>
        <label htmlFor='acknowledgement'>I acknowledge that the file I uploaded for sharing is free of any illicit material.</label>
        <input type="submit" onChange={"gettime()"}></input>
      </form>
    </div>
    </>
  );
}

export default App;
