package part01;

public class Tune implements iTune{
	//attributes:
	private int id;
	private static int nextId=1;
	private String title;
	private String artist;
	private int duration;
	private int playCount=0;
	private Genre style;
	
	
	/**
	 * the constructor for the Tune class
	 * @param title
	 * @param artist
	 * @param duration
	 * @param style
	 */
	public Tune(String title, String artist,int duration,Genre style){
		
		this.id=nextId();;
		this.setTitle(title);
		this.setArtist(artist);
		this.setDuration(duration);
		this.setStyle(style);
	}



	//show all details of the Tune;
	/**
	 * 
	 */
	public String toString() {
		//id used to choice by user;
		String res="";
		res+=this.id+",";
		res+=this.title+",";
		res+=this.artist+",";
		res+=this.duration+",";
		res+=this.style+",";
		res+=this.playCount;
		
		return res;
	}
	/**
	 * not sure!!! change latter!!!!!!
	 */
	public String play() {
		PlayCount();
		String result = "";
		result += "id: "+this.id+"\n";
		result += "title: "+this.title+"\n";
		result += "artist: "+this.artist+"\n";
		result += "duration: "+this.duration+"\n";
		result += "Genre:"+this.style+"\n";
		result += "Play count: " + playCount+"\n";
		return result;
	}
	
	
	/**
	 * count the id for the Tune and can't change by user;
	 * @return int nextId;
	 */
	private int nextId(){
		return nextId++;
	}
	
	
	/**
	 * 
	 * get and set method for Tune, it can set by user;
	 */
	
	
	
	/**
	 * set the attribute: user can set the attribute to add the Tune;
	 * @param title
	 */
	public void setTitle(String title) {
		this.title = title;
	}
	
	
	/**
	 * set artist
	 * @param artist
	 */
	public void setArtist(String artist) {
		this.artist = artist;
	}
	
	/**
	 * set duration
	 * @param duration
	 */
	public void setDuration(int duration) {
		this.duration = duration;
	}

	/**
	 * set style
	 * @param style
	 */
	public void setStyle(Genre style) {
		if ( style != null ) {
			this.style = style;
		}
	}
	
	
	/**
	 * 
	 * get all attribute one by one for user call in MP3Player;

	 */
	
	/**
	 * 
	 * @return id of Tune
	 */
	public int getId() {	
		return this.id;
	}
	
	/**
	 * 
	 * @return title of Tune
	 */
	public String getTitle() {
		return this.title;
	}
	
	/**
	 * 
	 * @return artist of Tune; 
	 */
	public String getArtist() {
		return this.artist;
	}
	
	/**
	 * 
	 * @return duration of Tune;
	 */
	public int getDuration() {
		return this.duration;
	}
	
	/**
	 * 
	 * @return style of Tune;
	 */
	public Genre getStyle() {
		return this.style;
	}
	
	/**
	 * 
	 * @return play count for the Tune, show what times the Tune played;
	 */
	private  int PlayCount() {
		playCount++;
		return this.playCount;
	}
	
	public int getPlayCount() {
		return this.playCount;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
