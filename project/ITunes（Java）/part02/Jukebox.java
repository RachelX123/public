package part02;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.PrintWriter;
import java.util.Scanner;

import part01.*;

public class Jukebox extends MP3Player {

	public Jukebox() {
		
	}

	//attribute:
	private int credits = 2;
	private int costPerCredit = 2;

	
	// for call play method to set and get the 
	public void setCostPerCredits(int costPerCredits) {
		this.costPerCredit = costPerCredits;
	}
	
	public int getCostPerCredits() {
		return this.costPerCredit;
	}
	
	/**
	 * play the Tune consider the credits;
	 * @Override
	 */
	public String play(int tuneId) {
		int newtuneId = tuneId;
		String result = null;
		if (credits > 0) {
			credits--;
			result = super.play(newtuneId);
			System.out.println("You have " + credits + " remaining.");

		} else {
			return "You have no credits";
		}
		return result;
	}

	// complete this implementation
	

	

	/**
	 * output into the file;
	 * @Override
	 */
	public boolean switchOn() {
        File file = new File("src/part2.csv");
        try {
            Scanner myFile = new Scanner(file);
            while (myFile.hasNextLine()) {
                String words[] = myFile.nextLine().split(",");
                Genre gen = null;
                if (words[4] == "Easy Listening Pop") {
                    gen = Genre.POP;
                } else if (words[4] == "Classical") {
                    gen = Genre.CLASSICAL;
                } else if (words[4] == "Rock and Roll") {
                    gen = Genre.ROCK;
                } else if (words[4] == "Techno Dance") {
                    gen = Genre.DANCE;
                } else if (words[4] == "Smooth Jazz") {
                    gen = Genre.JAZZ;
                } else if (words[4] == "Unknown Genre") {
                    gen = Genre.OTHER;
                }
                int Duration = Integer.parseInt(words[3]);
                super.addTune(words[1], words[2], Duration, gen);
            }
            System.out.println(" Read File successfully.");
            myFile.close();
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        }
        return true;
    }

	/**
	 * 
	 * @Override
	 */
	public boolean switchOff() {
		String file = "src/part2.csv";

		try {
			String result[] = super.getTuneInfo();
			PrintWriter myPW = new PrintWriter(file);
			for (int i = 0; i < result.length; i++) {
				myPW.println(result[i]);
			}
			// Define and print some formatted text
			myPW.close();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		}

		return true;
	}

	public void insertCoin(int coin) {

		if (coin == 10 || coin == 20 || coin == 50 || coin == 100 || coin == 200) {

			credits += (coin / costPerCredit);

		} else {

			System.out.println("Coin not Allowed.");
		}

	}

}

