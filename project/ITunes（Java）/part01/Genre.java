package part01;

//for the Tune Genre;get all detail for the type of plays;
public enum Genre {
	ROCK(0), POP(1), DANCE(2), JAZZ(3), CLASSICAL(4), OTHER(5);
	
	private String spelling[] = {	"Rock and Roll",
			"Easy Listening Pop",
			"Techno Dance",
			"Smooth Jazz",
			"Classical",
			"Unknown Genre"} ;

	private int index;


	private Genre(int num) {

		index = num;

	}


	public String toString() {

		return spelling[index];

	}
	
	
	
	
}
