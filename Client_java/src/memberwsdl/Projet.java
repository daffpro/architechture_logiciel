package memberwsdl;

public class Projet {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		MemberWSDLPortType m = new MemberWSDL().getMemberWSDLPort();
        System.out.print(m.getUsers("OYkQ0edcXl"));
}
}