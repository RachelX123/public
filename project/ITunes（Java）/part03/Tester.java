package part03;

import part01.*;

public class Tester {
	//playCount=0
	//id=1 
	static String validTitle1 = "One";
	static String validArtist1 = "U2";
	static int validDuration1 = 380;
	static Genre validGenre1 = Genre.ROCK;
	
	//id=2
	static String validTitle2 = "Four Seasons - Winter";
	static String validArtist2 = "Vivaldi";
	static int validDuration2 = 5500;
	static Genre validGenre2 = Genre.CLASSICAL;

	//id=3
	static String validTitle3 = "The Chain";
	static String validArtist3 = "Fleetwood Mac";
	static int validDuration3 =  750;
	static Genre validGenre3 = Genre.ROCK;
	
	//id=4 
	static String validTitle4 = "Graceland";
	static String validArtist4 = "Paul Simon";
	static int validDuration4 =  350;
	static Genre validGenre4 = Genre.POP;
	
	//id=5 
	static String validTitle5 = "Help";
	static String validArtist5 = "The Beatles";
	static int validDuration5 =  300;
	static Genre validGenre5 = Genre.POP;
	
	public static void main(String[] args) {
		tasterCase1();

		testerCase2();
		
		testerCase3();
		
		testerCase4();
		
		testerCase5();
		
		testerCase6();
		
		testerCase7();
		
		testerCase8();
		
		testerCase9();
		
		//testerCase10();
		
	}

	//for Tune:
	public static void tasterCase1() {
		
		System.out.println("Test Case 1 - Valid Tune Construction");
		System.out.println(" ====================================");
		
		try {
			Tune one = new Tune(validTitle1,validArtist1,validDuration1,validGenre1);
			System.out.println("Construction Successfull");
			System.out.println();
			System.out.println("Expected Title: " + validTitle1);
			System.out.println("Actual Title: " + one.getTitle());
			System.out.println();
			System.out.println("Expected Artist: " + validArtist1);
			System.out.println("Actual Artist: " + one.getArtist());
			System.out.println();
			System.out.println("Expected Duration: " + validDuration1);
			System.out.println("Actual Duration: " + one.getDuration());
			System.out.println();
			System.out.println("Expected Genre: " + validGenre1);
			System.out.println("Actual Genre: " + one.getStyle());
		}
		catch(Exception ex) {
			System.out.println("Exception : "+ ex);
			System.out.println("Error -  this should not happen for valid data");
		}
		System.out.println(" =====================================");
		System.out.println();
		System.out.println("Test Case 1 Ended");	
		System.out.println();
	}

	//for play the Tune:
	public static void testerCase2() {
		
		System.out.println("Test Case 2 - Valid Tune Play");
		System.out.println(" ============================");
		try {
			Tune one = new Tune(validTitle1,validArtist1,validDuration1,validGenre1);
			Tune two = new Tune(validTitle2,validArtist2,validDuration2,validGenre2);
			one.play();
			System.out.println("Play Successfull");
			System.out.println();
			System.out.println("Expected Play: " + validTitle1+": "+"1");
			System.out.println("Actual Play: " + validTitle1+": "+one.getPlayCount());
			System.out.println();
			System.out.println("Expected Play: " + validTitle2+": "+"0");
			System.out.println("Actual Play: " + validTitle2+": "+two.getPlayCount());
		}
		catch(Exception ex) {
			System.out.println("Exception : "+ ex);
			System.out.println("Error -  this should not happen for valid data");
		}
		System.out.println(" =============================");
		System.out.println();
		System.out.println("Test Case 2 Ended");
		System.out.println();
	}
	
	//for MP3Player Construction and add Tune:
	public static void testerCase3() {
		
		System.out.println("Test Case 3 - Valid MP3Player Construction and add Tune");
		System.out.println(" ======================================================");
		try {
			MP3Player myPlayer = new MP3Player();
			System.out.println("Construction Successfull");
			System.out.println();
			System.out.println("Expected Result: an reference" );
			System.out.println("Actual Result: " + myPlayer.toString());
			System.out.println();
			
			
			
			myPlayer.addTune(validTitle1, validArtist1, validDuration1, validGenre1);
			myPlayer.addTune(validTitle2, validArtist2, validDuration2, validGenre2);
			System.out.println("Add new Tune Successfull");
			
			//id+title+artist+duration+genre+play count:
			System.out.println("Execpted Result: 1"+","+validTitle1+","+ validArtist1+","+validDuration1+","+validGenre1+","+"0");
			System.out.println("Actual Result: "+myPlayer.soundData.get(0).toString());
			System.out.println();
			System.out.println("Execpted Result: 2"+","+validTitle2+","+ validArtist2+","+validDuration2+","+validGenre2+","+"0");
			System.out.println("Actual Result: "+myPlayer.soundData.get(1).toString());
		}
		catch(Exception ex) {
			System.out.println("Exception : "+ ex);
			System.out.println("Error -  this should not happen for valid data");
		}
		System.out.println(" =====================================================");
		System.out.println();
		System.out.println("Test Case 3 Ended");
		System.out.println();
	}
	
	// for MP3Player-- add same Tune:
	public static void testerCase4() {
		
		
		System.out.println("Test Case 4 - Valid MP3Player can not add same Tune");
		System.out.println(" ==================================================");
		try {
			MP3Player myPlayer = new MP3Player();
			myPlayer.addTune(validTitle1, validArtist1, validDuration1, validGenre1);
			myPlayer.addTune(validTitle2, validArtist2, validDuration2, validGenre2);
			
			//add it again:
			boolean same = myPlayer.addTune(validTitle1, validArtist1, validDuration1, validGenre1);
			System.out.println("Add same Tune false!");
			System.out.println();
			System.out.println("Execpted Result: "+ false);
			System.out.println("Actual Result: "+same);
			System.out.println();
			
			boolean differ = myPlayer.addTune("The Chain", "Fleetwood Mac", 750, Genre.ROCK);
			System.out.println("Add different Tune Successful!");
			System.out.println();
			System.out.println("Execpted Result: "+ true);
			System.out.println("Actual Result: "+differ);
			System.out.println();
		}
		catch(Exception ex) {
			System.out.println("Exception : "+ ex);
			System.out.println("Error -  this should not happen for valid data");
		}
		System.out.println(" ==================================================");
		System.out.println();
		System.out.println("Test Case 4 Ended");
		System.out.println();
	}
	
	//for MP3Player--show all list:
	public static void testerCase5() {
		
		System.out.println("Test Case 5 - Valid MP3Player can list all Tune");
		System.out.println(" ==============================================");
		
		try {
		//add some Tune into 
			MP3Player myPlayer = new MP3Player();
			myPlayer.addTune(validTitle1, validArtist1, validDuration1, validGenre1);
			myPlayer.addTune(validTitle2, validArtist2, validDuration2, validGenre2);
			myPlayer.addTune(validTitle3, validArtist3, validDuration3, validGenre3);
			myPlayer.addTune(validTitle4, validArtist4, validDuration4, validGenre4);
			myPlayer.addTune(validTitle5, validArtist5, validDuration5, validGenre5);

			
		
			String[] expection = myPlayer.getTuneInfo();
			System.out.println("List all Tune Successfull");
			System.out.println();
			System.out.println("Execpted Result: ");
			System.out.println("Title: "+validTitle1);
			System.out.println("Artist: "+validArtist1);
			System.out.println("Duration: "+validDuration1);
			System.out.println("Genre: "+validGenre1);
			System.out.println();
			System.out.println("Title: "+validTitle2);
			System.out.println("Artist: "+validArtist2);
			System.out.println("Duration: "+validDuration2);
			System.out.println("Genre: "+validGenre2);
			System.out.println();
			System.out.println("Title: "+validTitle3);
			System.out.println("Artist: "+validArtist3);
			System.out.println("Duration: "+validDuration3);
			System.out.println("Genre: "+validGenre3);
			System.out.println();
			System.out.println("Title: "+validTitle4);
			System.out.println("Artist: "+validArtist4);
			System.out.println("Duration: "+validDuration4);
			System.out.println("Genre: "+validGenre4);
			System.out.println();
			System.out.println("Title: "+validTitle5);
			System.out.println("Artist: "+validArtist5);
			System.out.println("Duration: "+validDuration5);
			System.out.println("Genre: "+validGenre5);
			System.out.println();
			System.out.println("---------------");
			System.out.println("Actual Result: ");
			
			System.out.println();
			for(String oneTune:expection) {
				String temp[] = oneTune.split(",");
				System.out.println("Title: "+temp[1]);
				System.out.println("Artist: "+temp[2]);
				System.out.println("Duration :"+temp[3]);
				System.out.println("Genre: "+temp[4]);
				System.out.println();
			}
			
		}
		
		catch(Exception ex) {
			System.out.println("Exception : "+ ex);
			System.out.println("Error -  this should not happen for valid data");
		}
		System.out.println(" ==============================================");
		System.out.println();
		System.out.println("Test Case 5 Ended");
		System.out.println();
	}
	
	//for MP3Player-select Tune by Genre:
	public static void testerCase6() {
		System.out.println("Test Case 6 - Valid MP3Player can  list all Tune select by Genre");
		System.out.println(" ===============================================================");
		
		try {
			
			MP3Player myPlayer = new MP3Player();
			myPlayer.addTune(validTitle1, validArtist1, validDuration1, validGenre1);
			myPlayer.addTune(validTitle2, validArtist2, validDuration2, validGenre2);
			myPlayer.addTune(validTitle3, validArtist3, validDuration3, validGenre3);
			myPlayer.addTune(validTitle4, validArtist4, validDuration4, validGenre4);
			myPlayer.addTune(validTitle5, validArtist5, validDuration5, validGenre5);
			
			Genre gen = Genre.POP;
			String [] result = myPlayer.getTuneInfo(gen);
			System.out.println("List all Tune with POP Genre Successfull");
			System.out.println();
			
			System.out.println("Execpted Result: ");
			System.out.println();
			
			System.out.println("Title: "+validTitle4);
			System.out.println("Artist: "+validArtist4);
			System.out.println("Duration: "+validDuration4);
			System.out.println("Genre: "+validGenre4);
			System.out.println();
			System.out.println("Title: "+validTitle5);
			System.out.println("Artist: "+validArtist5);
			System.out.println("Duration: "+validDuration5);
			System.out.println("Genre: "+validGenre5);
			System.out.println();
			System.out.println("---------------");
			System.out.println("Actual Result: ");
			
			System.out.println();
			
			for(String oneTune: result) {
				
				if(oneTune.equals(" ")) {
					
				}
				else {
					
					String temp[] = oneTune.split(",");
					System.out.println("Title: "+temp[1]);
					System.out.println("Artist: "+temp[2]);
					System.out.println("Duration :"+temp[3]);
					System.out.println("Genre: "+temp[4]);
					System.out.println();
				}
			}	
			
		}
		catch(Exception ex) {
			System.out.println("Exception : "+ ex);
			System.out.println("Error -  this should not happen for valid data");
		}
		System.out.println(" ==============================================");
		System.out.println();
		System.out.println("Test Case 6 Ended");
		System.out.println();
		
	}
	
	//for MP3Player-select Tune by Artist:
	public static void testerCase7() {
		
		System.out.println("Test Case 7 - Valid MP3Player can  list all Tune select by Artist");
		System.out.println(" ================================================================");
		
		try {
			MP3Player myPlayer = new MP3Player();
			myPlayer.addTune(validTitle1, validArtist1, validDuration1, validGenre1);
			myPlayer.addTune(validTitle2, validArtist2, validDuration2, validGenre2);
			myPlayer.addTune(validTitle3, validArtist3, validDuration3, validGenre3);
			myPlayer.addTune(validTitle4, validArtist4, validDuration4, validGenre4);
			myPlayer.addTune(validTitle5, validArtist5, validDuration5, validGenre5);
			String validTitle6 = "Help";
			String validArtist6 = "U2";
			int validDuration6 =  300;
			Genre validGenre6 = Genre.POP;
			myPlayer.addTune(validTitle6, validArtist6, validDuration6, validGenre6);
			
			String [] result = myPlayer.getTuneInfo("U2");
			System.out.println("List all Tune with Artist U2 Successfull");
			System.out.println();
			
			System.out.println("Execpted Result: ");
			System.out.println();
			
			System.out.println("Title: "+validTitle1);
			System.out.println("Artist: "+validArtist1);
			System.out.println("Duration: "+validDuration1);
			System.out.println("Genre: "+validGenre1);
			System.out.println();
			System.out.println("Title: "+validTitle6);
			System.out.println("Artist: "+validArtist6);
			System.out.println("Duration: "+validDuration6);
			System.out.println("Genre: "+validGenre6);
			System.out.println();
			System.out.println("---------------");
			System.out.println("Actual Result: ");
			
			System.out.println();
			
			for(String oneTune: result) {
				
				if(oneTune.equals(" ")) {
					
				}
				else {
					
					String temp[] = oneTune.split(",");
					System.out.println("Title: "+temp[1]);
					System.out.println("Artist: "+temp[2]);
					System.out.println("Duration :"+temp[3]);
					System.out.println("Genre: "+temp[4]);
					System.out.println();
				}
			}
		}
		catch(Exception ex) {
			System.out.println("Exception : "+ ex);
			System.out.println("Error -  this should not happen for valid data");
		}
		System.out.println(" ================================================================");
		System.out.println();
		System.out.println("Test Case 7 Ended");
		System.out.println();
	}
	
	//for MP3Player-play the Tune;
	public static void testerCase8() {
		System.out.println("Test Case 8 - Valid MP3Player can  list all Tune select by Artist");
		System.out.println(" ================================================================");
		
		try {
			// add the Tune:
			MP3Player myPlayer = new MP3Player();
			myPlayer.addTune(validTitle1, validArtist1, validDuration1, validGenre1);
			myPlayer.addTune(validTitle2, validArtist2, validDuration2, validGenre2);
			myPlayer.addTune(validTitle3, validArtist3, validDuration3, validGenre3);
			myPlayer.addTune(validTitle4, validArtist4, validDuration4, validGenre4);
			myPlayer.addTune(validTitle5, validArtist5, validDuration5, validGenre5);
			
			//choice one to play:
			myPlayer.play(1);
			System.out.println("Play Tune  Successfull");
			System.out.println();
			
			System.out.println("Execpted Result: ");
			System.out.println();
			
			System.out.println(validTitle1+": 1");
			System.out.println(validTitle2+": 0");
			System.out.println(validTitle3+": 0");
			System.out.println(validTitle4+": 0");
			System.out.println(validTitle5+": 0");
			
			System.out.println("---------------");
			System.out.println("Actual Result: ");
			
			System.out.println();
			//show their play count:
			for(int i = 0; i<myPlayer.soundData.size();i++) {
				int result = myPlayer.soundData.get(i).getPlayCount();
				String title = myPlayer.soundData.get(i).getTitle();
				
				System.out.println( title+": "+result);
				
			}
			
		}
		catch(Exception ex) {
			System.out.println("Exception : "+ ex);
			System.out.println("Error -  this should not happen for valid data");
		}
		System.out.println(" ================================================================");
		System.out.println();
		System.out.println("Test Case 8 Ended");
		System.out.println();
		
		
	}

	//for MP3Player-switch on/off
	public static void testerCase9() {
		System.out.println("Test Case 9 - Valid MP3Player Switch Off and Switch On ");
        System.out.println(" ======================================================");
        try {
        	MP3Player myPlayer = new MP3Player();

            boolean SwitchOff = myPlayer.switchOff();
            boolean SwitchOn = myPlayer.switchOn();
            System.out.println("Expected Switch Off Result : " + false);
            System.out.println("Actual Result: " + SwitchOff);
            System.out.println();
            System.out.println("Expected Switch On Result : " + true);
            System.out.println("Actual Result: " + SwitchOn);
        }
        catch(Exception ex) {
			System.out.println("Exception : "+ ex);
			System.out.println("Error -  this should not happen for valid data");
		}
        System.out.println(" ======================================================");
        System.out.println();
        System.out.println("Test Case 9 Ended");
        System.out.println();
	}
	
	//for MP3Player-add Tune with lack information:
	/*public static void testerCase10(){
		System.out.println("Test Case 10 - Valid MP3player add Tune");
		System.out.println(" ====================================");
		try {
			MP3Player myPlayer = new MP3Player();
			System.out.println("Add new Tune false");
			System.out.println();
			System.out.println("Execpted Result: "+validTitle1+","+ validArtist1+","+validDuration1+","+validGenre1);
			System.out.println();
			System.out.println("Actual Result: "+myPlayer.addTune("",validArtist1,validDuration1, validGenre1));
			System.out.println();
			System.out.println();
			System.out.println("Execpted Result: "+validTitle2+","+ validArtist2+","+validDuration2+","+validGenre2);
			System.out.println();
			System.out.println("Actual Result: "+myPlayer.addTune(validTitle2,"",validDuration2, validGenre2));
			System.out.println();
			System.out.println("Execpted Result: "+validTitle3+","+ validArtist3+","+validDuration3+","+validGenre3);
			System.out.println();
			System.out.println("Actual Result: "+myPlayer.addTune(validTitle3, validArtist3, 0, validGenre3));
			System.out.println();
			/*
			System.out.println("Add new Tune Successfull");
			System.out.println();
			System.out.println("Execpted Result: "+validTitle4+","+ validArtist4+","+validDuration4+","+validGenre4);
			System.out.println();
			System.out.println("Actual Result: "+myPlayer.addTune(validTitle4, validArtist4, validDuration4, validGenre4));
			System.out.println("Actual Result: "+myPlayer.soundData.get(0).toString());
			
		}
		catch(Exception ex) {
			System.out.println("Exception : "+ ex);
			System.out.println("Error -  this should not happen for valid data");
		}
		System.out.println(" =====================================");
		System.out.println();
		System.out.println("Test Case 10 Ended");	
		System.out.println();
	}

	
	*/
	
	
	
	
}
