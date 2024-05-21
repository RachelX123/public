package part02;
import part01.*;
import part02.Menu;

import java.util.ArrayList;
import java.util.Scanner;
public class SystemApp {
	
	static Scanner input = new Scanner(System.in);
	static MP3Player myPlayer = new Jukebox();
    static Jukebox myJukebox = (Jukebox) myPlayer;
	static int count = 0;//count object of Tune's array
	static Tune Tunes[] = new Tune[count];
	static final int tenTop= 10;
	//static Genre style;
	public static ArrayList<Tune> soundData;
	static int status = 0; //is open or not;1 is open ,0 is close;
	
	public static void main(String[] args) {
		
		
		
		//add elements into ArrayList;
		addSomeTunes();//some Tune have been add in the Tune before;
		
		getOptions();
		// needs a Menu & supporting code
		/*String options[] = { "Select From Full List", "Select Tune By Artist", "Select Tune by Genre", 
                "Add a new Tune" , "Display Top 10", "Switch On","Switch Off","Exit" };//choice an option to run
		//
		Menu sysMen = new Menu("Select a Tune - Full List", options);//get the choice;
		
		boolean finished =false;
        do {
            int choice = sysMen.getUserChoice();
            if (choice == options.length&&status==0) {
                finished = true;
            } else {
                processChoice(choice);
            }
        } while (!finished);
        System.out.println("Exit System");
        */
        /*
        Menu sysMen = new Menu("Company Payroll", options);
		boolean finished = false;
		do {
			int choice = sysMen.getUserChoice();
			if (choice == options.length) {
				finished = true;
			} else {
				processChoice(choice);
			}
		} while (!finished);
		System.out.println("Goodbye!");
		
	}
	*/
	
		
		
		
	}
	
	private static void getOptions() {
		// needs a Menu & supporting code
				
		String options[] = { "Select From Full List", "Select Tune By Artist", "Select Tune by Genre", 
		           "Add a new Tune" , "Display Top 10", "Switch On","Switch Off","Exit" };//choice an option to run
	
		Menu sysMen = new Menu("Select a Tune - Full List", options);//get the choice;	
		boolean finished =false; 
		do {       
			int choice = sysMen.getUserChoice();
			if (choice == options.length&&status==0) {
				finished = true;
			} else {     
				processChoice(choice);   
			}   
		} while (!finished);
		System.out.println();
		System.out.println("Exit System");
	}
	
	

	/**
	 * get the choice to run 
	 * @param choice
	 */
	private static void processChoice(int choice) {
		switch (choice) {
		case 1:
			displayFullList();
			break;	
		case 2:
			SelectTuneByArtist();
			break;
		case 3:
			SelectTuneByGenre();
			break;
			
		case 4:
			AddANewTune();
			break;
		case 5:	
			DisplayTop10();
			break;
	 	case 6:
			SwitchOn();
		case 7:
		    SwitchOff();
		case 8:
		    Exit();	
		default:
		    System.out.println("Option " + choice + " is invalid.");
		    
		}
		System.out.println();
			
	}
	

	private static void addSomeTunes() {
		myPlayer.addTune("One", "U2", 380, Genre.ROCK);
		myPlayer.addTune("Four Seasons - Winter", "Vivaldi", 5500, Genre.CLASSICAL);
		myPlayer.addTune("The Chain", "Fleetwood Mac", 750, Genre.ROCK);
		myPlayer.addTune("Graceland", "Paul Simon", 350, Genre.POP);
		myPlayer.addTune("Help", "The Beatles", 300, Genre.POP);
		//an array for there name;

		
		count=count+5;
	}
	
	/**
	 * show all Tune inside myPlayer
	 */
	private static void displayFullList()  {
		if(status==1) {
			//get all info
			String show;
			show="\n"+"\n";
			show+="----------"+"\n";
			show+="All Tunes:"+"\n";
			System.out.println(show);
			String [] allTune = myPlayer.getTuneInfo();
			
			for(String oneTune: allTune) {
				String temp[] = oneTune.split(",");
				System.out.println("Id: "+temp[0]);
				System.out.println("Title: "+temp[1]);
				System.out.println("Artist: "+temp[2]);
				System.out.println("Duration :"+temp[3]);
				System.out.println("Style: "+temp[4]);
				System.out.println();
			}
			System.out.println();
	
			//ask want to play or not:
			play();
		}
		if(status==0) {
			System.out.println("\nPlease Open the SystemApp Firstly!");
		}
	}
	
	/**
	 * show the Tune by Artist and play it
	 */
	private static void SelectTuneByArtist() {
		if(status==1) {
			System.out.println("Select Tune By Artist"+"\n");
			System.out.println("Please type the Artist");
			String artist = input.nextLine();
			String [] allTune = myPlayer.getTuneInfo(artist);//get the array from MP3Player's return;
			int b=0;// use to check this element is exist
			String show;
			show="----------"+"\n";
			show+="All Tunes:";
			System.out.println(show);
			//ergodic the array;
	
			for(String oneTune: allTune) {
				
				if(oneTune.equals("")) {
					
				}
				
				else {
					String temp[] = oneTune.split(",");
					System.out.println();
					System.out.println("Id: "+temp[0]);
					System.out.println("Title: "+temp[1]);
					System.out.println("Artist: "+temp[2]);
					System.out.println("Duration :"+temp[3]);
					System.out.println("Genre: "+temp[4]);
					b++;
				}
			}
			System.out.println();
			
			String divide="-------------------------";
			if(b>0) {//when there is exist element;
				System.out.println(divide);
				play();
			}
			else{//when there is no Tune inside;
				System.out.println("Sorry!\n"+"\nHaven't find.");
				System.out.println();
				System.out.println(divide);
			
			}
		}
		if(status==0) {
			System.out.println("\nPlease Open the SystemApp Firstly!");
		}
	}
	
	/**
	 * show the Tune by Genre and play it
	 */
	private static void SelectTuneByGenre() {
		if(status==1) {
			String options[]= {"ROCK","POP","DANCE","JAZZ","CLASSICAL","OTHER"};
			Menu sysMen = new Menu("Select Tune By Genre", options);
			int choice = sysMen.getUserChoice();//get the choice;
			if(choice==1) {
				String show;
				show="----------"+"\n";
				show+="All Tunes:";
				System.out.println(show);
				Genre style = Genre.ROCK;
				forChoiceGen(style);//get and check the Tune.
			}
			if(choice==2) {
				String show;
				show="----------"+"\n";
				show+="All Tunes:";
				System.out.println(show);
				Genre style = Genre.POP;
				forChoiceGen(style);
			}
			if(choice==3) {
				String show;
				show="----------"+"\n";
				show+="All Tunes:";
				System.out.println(show);
				Genre style = Genre.DANCE;
				forChoiceGen(style);
			}
			
			if(choice==4) {
				String show;
				show="----------"+"\n";
				show+="All Tunes:";
				System.out.println(show);
				Genre style = Genre.JAZZ;
				forChoiceGen(style);
			}
			if(choice==5) {
				String show;
				show="----------"+"\n";
				show+="All Tunes:";
				System.out.println(show);
				Genre style = Genre.CLASSICAL;
				forChoiceGen(style);
			}
			if(choice==6) {
				String show;
				show="----------"+"\n";
				show+="All Tunes:";
				System.out.println(show);
				Genre style = Genre.OTHER;
				forChoiceGen(style);
			}
		}
		if(status==0) {
			System.out.println("\nPlease Open the SystemApp Firstly!");
		}
	}

	private static void AddANewTune() {
		if(status==1) {
	        // get info for a tune
	        System.out.print("Please Enter Title(Beginning with captial letter) : ");
	        String title = input.nextLine();
	        System.out.print("Pleases Enter Artist: ");
	        String artist = input.nextLine();
	        System.out.print("Please Enter Duration: ");
	        int duration = input.nextInt();
	        input.nextLine();
	        System.out.print("Please Enter Genre: ");
	        // select genre
	        String Options[] = { "Rock", "Pop", "Dance", "Jazz", "Classical", "Other" };

	        Menu Men = new Menu("Select a Genre", Options);

	        Genre gen;

	        int choice = Men.getUserChoice();
			if(choice==1) {
				gen = Genre.ROCK;
				addNewTune(title,artist,duration,gen);
				
			}if(choice==2) {
				gen = Genre.POP;
				addNewTune(title,artist,duration,gen);
			}
			if(choice==3) {
				gen = Genre.DANCE;
				addNewTune(title,artist,duration,gen);
			}
			if(choice==4) {
				gen = Genre.JAZZ;
				addNewTune(title,artist,duration,gen);
			}
			if(choice==5) {
				gen = Genre.CLASSICAL;
				addNewTune(title,artist,duration,gen);
				
			}if(choice==6) {
				gen = Genre.OTHER;
				addNewTune(title,artist,duration,gen);
			}
		}
		
		if(status==0) {
			System.out.println("\nPlease Open the SystemApp Firstly!");
		}
		
	}
	
	//just show name and times of play; !!!!!!!
	private static void DisplayTop10() {
		if(status==1) {
			String [] result = myPlayer.getTuneInfo();
			String oneTune="";
			if(count>10) {
				System.out.println();
				for(int i=0; i<9; i++) {
					oneTune = result[i];
					String[] temp=oneTune.split(",");
					System.out.println("Title: "+temp[1]);
					System.out.println("Play Count: "+temp[5]);
					System.out.println();
				}
			}
			if(count<10) {
				System.out.println();
				for(int i=0; i<count; i++) {
					oneTune = result[i];
					String[] temp=oneTune.split(",");
					System.out.println("Title: "+temp[1]);
					System.out.println("Play Count: "+temp[5]);
					System.out.println();
				}
			}
		}
		if(status==0) {
			System.out.println("\nPlease Open the SystemApp Firstly!");
		}
	}
	
	private static void SwitchOn() {
		if(status == 0) {
			status = 1;
			System.out.println();
			System.out.println("It is open now!");
			System.out.println();
			getOptions();
		}
		else {
			System.out.println("\nIt is Opening!");
			System.out.println();
			getOptions();
		}
	}
	
	private static void SwitchOff() {
		
		if(status==1) {
			status=0;
			System.out.println();
			System.out.println("It is close now!");
			System.out.println();
			getOptions();
		}
		else {
			System.out.println("\nIt is Closing");
			System.out.println();
			getOptions();
		}
	}
	
	private static void Exit() {
		if(status==0) {
			System.out.println();
			System.out.println("End of Program");
			System.exit(0);
		}
		if(status==1) {
			
			System.out.println("\nPlease Close the SystemApp Firstly!");
			
		}
	}
	
	//ask to play a Tune
  	private static void play() {
		int choice;
		String options[]= { "Yes","No" };
		Menu sysMen = new Menu("Do you want to play one?", options);
		choice = sysMen.getUserChoice();
		//play the Tune
		while(choice==1){
			System.out.println("Please type the id to play the Tune:");
			//Scanner ID = new Scanner(System.in);
			int id = input.nextInt();
			if(id<=count) {
				String play=myPlayer.play(id);
				System.out.println(play);
				
				String options2[]= { "Yes","No" };
				Menu sysMen2 = new Menu("Do you want to play one?", options);
				choice = sysMen2.getUserChoice();
			}
			else {
				System.out.println("Sorry! Haven't find this Tune!");
				System.out.println();
				String options2[]= { "Yes","No" };
				Menu sysMen2 = new Menu("Do you want to play one?", options);
				choice = sysMen2.getUserChoice();
			}
		}
		
		System.out.println("\n"+"Thank you!");

		String divide="-------------------------";
		System.out.println(divide);
	}
	
 	
 	
 	/**
 	 * get and check the Tune from array in MP3Player
 	 * @param style
 	 */
	private static void forChoiceGen(Genre style) {
		
		String [] allTune = myPlayer.getTuneInfo(style);
		
		int b = 0;
		
		for(String oneTune: allTune) {
			
			if(oneTune.equals("")) {
				
			}
			else {
				System.out.println();
				String temp[] = oneTune.split(",");
				System.out.println("Id: "+temp[0]);
				System.out.println("Title: "+temp[1]);
				System.out.println("Artist: "+temp[2]);
				System.out.println("Duration :"+temp[3]);
				System.out.println("Genre: "+temp[4]);
				b++;
			}
		}
		System.out.println();
			
		
		String divide="-------------------------";
		if(b>0) {
			System.out.println(divide);
			play();
		}
		else{
			System.out.println("Sorry!\n"+"\nHaven't find.");
			System.out.println();
			System.out.println(divide);
		
		}
 	
	}

	
	/**
	 * add new Tune:
	 */
	private static void addNewTune(String title, String artist, int duration, Genre style) {
		boolean add = myPlayer.addTune(title, artist, duration, style);
		
		if(add) {
			System.out.println();
			System.out.println("Title: "+title);
			System.out.println("Artist: "+artist);
			System.out.println("Duration: "+duration);
			System.out.println("Genre: "+style);
			System.out.println();
			System.out.println("Add successfully !");
			System.out.println();
			count++;
		}
	}
}