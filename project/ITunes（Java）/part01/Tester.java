package part01;

public class Tester {
	
	static MP3Player myPlayer = new MP3Player();

	public static void main(String[] args) {
		/*Tune a = new Tune("One", "U2", 380, Genre.ROCK);
		Tune b = new Tune("Four Seasons - Winter", "Vivaldi", 5500, Genre.CLASSICAL);
		Tune c = new Tune("The Chain", "Fleetwood Mac", 750, Genre.ROCK);


		System.out.println(a.play());
		System.out.println(c.play());
		System.out.println(b.play());
		*/
		
		
		addSomeTunes();
		myPlayer.addTune("Help", "The Beatles", 300, Genre.POP);
		
		//get all info of Tune  
		/*String []x;
		x=myPlayer.getTuneInfo();
		String d =" ";
		for (int index = 0; index < 6; index++) {
			d=x[index];
			//toString()method has all 
			System.out.println(d);
			System.out.println();
		}
		
		*/
		 //choice by id 
		/*System.out.println(myPlayer.play(4));
		System.out.println();
		System.out.println(myPlayer.play(3));
		System.out.println();
		System.out.println(myPlayer.play(4));
		*/
		
		
		String [] z;
		z=myPlayer.getTuneInfo("U2");
		
		String e =" ";
		for (int index = 0; index <5; index++) {
			e=z[index].toString();
			//toString()method has all 
			System.out.println(e);
			System.out.println();
		}
		
		/*
		String [] z;
		z=myPlayer.getTuneInfo(Genre.DANCE);
		
		String e ="";
		for (int index = 0; index <z.length; index++) {
			e=z[index];
			//toString()method has all 
			System.out.println(e);
			System.out.println();
		}
		
		*/
		
		
		
		
		
	}
	private static void addSomeTunes() {
		myPlayer.addTune("One", "U2", 380, Genre.ROCK);
		myPlayer.addTune("Four Seasons - Winter", "Vivaldi", 5500, Genre.CLASSICAL);
		myPlayer.addTune("The Chain", "Fleetwood Mac", 750, Genre.ROCK);
		myPlayer.addTune("Graceland", "Paul Simon", 350, Genre.POP);
		myPlayer.addTune("Help", "The Beatles", 300, Genre.POP);
		
	}

}
