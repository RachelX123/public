package part01;

import java.util.ArrayList;

public class MP3Player implements iPlayer{
	
	//return ArrayList
	public ArrayList<Tune> soundData;
	private  static int status=0;//0 is close, 1 is open
	
	public MP3Player() {
		this.soundData = new ArrayList<Tune> ();
		
	}
	
	/**
	 * get all info of all element in soundData;
	 * get all detail 
	 * need to be order by Title
	 */
	public String[] getTuneInfo(){
		//just can get the info
		/*if (soundData.size() > 0) {
			String[] names = new String[soundData.size()];
			for (int index = 0; index < soundData.size(); index++) {
				names[index] = soundData.get(index).toString();
				//toString()method has all 
			}
			return names;
		}
		else{
			String[]names = new String[1];
			names[1] = "an error";
			return names;
			
		}
		*/
		String[]error = new String[1];
		error[0] = "There is no Tune";
		if (soundData.size() > 0) {
		
			int swaps;//count change 
			String name[] = new String[soundData.size()];
			do {
				swaps = 0;
				//index start from 0 only can change size-1 times;
				for(int i = 0; i < soundData.size() - 1; i++) {
					
					if (soundData.get(i).getTitle().compareTo(soundData.get(i+1).getTitle())>0) {
						Tune temp = soundData.get(i);
						//change the order of the arrayList (bubble sort) swap the element's position;
						soundData.set(i, soundData.get(i+1));
						soundData.set(i+1, temp);
						swaps ++;//times of change;
					}
				}
			}while(swaps > 0);
			
			//show all detail of the element;
			for(int index = 0; index < soundData.size();index++) {
				name[index] = soundData.get(index).toString();
			}
			
			if(name.length>0) {
				return name;
			
			}
			else {
				
				return error;
			}
			
		}
		
		else {
			
			return error;
		}
		
	}
	
	//return String[]
	/**
	 * need to be order by Title
	 */
	public String[] getTuneInfo(Genre style) {	
		String[]error = new String[1];
		error[0] = "There is no Tune";
		if (soundData.size() > 0) {
			int swaps;
			//order the element by Title;
			do {
				swaps = 0;
				//index start from 0 only can change size-1 times;
				for(int i = 0; i < soundData.size() - 1; i++) {
					if (soundData.get(i).getTitle().compareTo(soundData.get(i+1).getTitle())>0) {
						Tune temp = soundData.get(i);
						//change the order of the arrayList (bubble sort) swap the element's position;
						soundData.set(i, soundData.get(i+1));
						soundData.set(i+1, temp);
						swaps ++;//times of change;
					}
				}
			}while(swaps > 0);
			
			//choice the Tune by style:
			String nameByStyle[] = new String[soundData.size()];
			int i = 0;
			for(int index= 0; i < soundData.size();index++) {//get all Tune
				if(soundData.get(index).getStyle().equals(style)) {//get all Tune in same style(choice element from total list)
					nameByStyle[i] = soundData.get(index).toString();//get info of element;
					i++;
				}
				else {
					nameByStyle[i]="";
					i++;
				}
			}
			
			if(nameByStyle.length>0) {
				return nameByStyle;
			}
			else {
				
				return error;
			}
		}
		else {
			
			return error;
		}
		
		
	}
	
	public String[] getTuneInfo(String artist) {
		String[]error = new String[1];
		error[0] = "There is no Tune";
		if (soundData.size() > 0) {
			int swaps;
			do {
				swaps = 0;
				//index start from 0 only can change size-1 times;
				for(int i = 0; i < soundData.size() - 1; i++) {
					if (soundData.get(i).getTitle().compareTo(soundData.get(i+1).getTitle())>0) {
						Tune temp = soundData.get(i);
						//change the order of the arrayList (bubble sort) swap the element's position;
						soundData.set(i, soundData.get(i+1));
						soundData.set(i+1, temp);
						swaps ++;//times of change;
					}
				}
			}while(swaps > 0);
			
			String nameByArtist[] = new String[soundData.size()];	
			int i=0;
			for(int index = 0; index < soundData.size();index++) {//get all Tune
				if(soundData.get(index).getArtist().equals(artist)) {//get all Tune in same artist(choice element from total list)
					nameByArtist[i] = soundData.get(index).toString();//get info of element;
					i++;
				}
				else {
					nameByArtist[i]="";
					i++;
				}
			}
			
			if(checkHave(nameByArtist,artist)) {
				
				return error;
			}
			else {
				return nameByArtist;
			}
			
		}
		else {
			
			return error;
		}
	}
	

	
	/**
	 * call the method to get all detail than choice the id to show
	 */
	public String play(int tuneId) {
		String show = " ";
		getTuneInfo();
		for(int index=0; index < soundData.size(); index++) {
			if (soundData.get(index).getId()==tuneId) {
				show = soundData.get(index).play();
				break;
			}
			else {
				show="Haven't find this Tune";
			}
		}
		
		return show;
	}
	
	/**
	 * 
	 *check there is no repeat 
	 *than it can add successfully;
	 *@Override
	*/
	public boolean addTune(String title, String artist, int duration, Genre style) {
		try {
			Tune addOne;
			if(title!=""&&artist!=""&&duration!=0) {
				addOne = new Tune(title,artist,duration,style);
				if(checkSame(title,artist,duration,style)) {
					soundData.add(addOne);
					return true;
				}
				else {
					System.out.println("The Tune has exsit !");
					System.out.println();
					
				}
			}
			else {
				System.out.println("Please give whole information of Tune");
			}
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return false;
	}
	
	@Override
	public boolean switchOn() {
		if(status==0) {
			status=1;
			return true;//means the app is open
		}
		return false;//means the app is close
	}
	
	@Override
	public boolean switchOff() {
		if(status==1) {
			status=0;
			Exit(status);
			return true;//means the app is off
		}
		return false;//means the app is open
	}
	
	public boolean Exit(int status) {
		if(status==0) {
			return true;
		}
		return false;
		
	}
	
	
	private boolean checkSame(String title, String artist, int duration, Genre style) {
		for(Tune tune: soundData) {
			if(tune.getTitle().equals(title)&&tune.getArtist().equals(artist)&&tune.getDuration()==duration&&tune.getStyle().equals(style)) {
				
				return false;
			}
		}
		return true;
	}
	
	private boolean checkHave(String[]data,String artist) {
			
		int i=0;
		for(int index = 0; index < data.length;index++) {//get all Tune
			if(data.equals(artist)) {//get all Tune in same artist(choice element from total list)
				
				i++;
			}
			else {
				
			}
		}
		if(i==0) {
			return false;
		}
		else {
			return true;
		}
	}
	
}
	
	
	
	
	
	
	
	
	
	
	/**
	 * if there is not repeating then add successfully;
	 */
	
	/**public boolean addTune(String title,String artist,int duration,Genre style) {
		if() {
			return true;
		}
		return false;
	}
	*/
	/**
	 * not sure!!!!!!!!!!!!!!the switch:
	 
	public boolean switchOff() {
		if(switchOn()) {
			return true;
		}
		else {
			System.out.println();
		}
		return false;
	}
	
	public boolean switchOn() {
		return true;
	}
	*/
	//@Override
	/*public boolean addtune(String tite, String artist, int duration, Genre style) {
		// TODO Auto-generated method stub
		return false;
	}
	*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
