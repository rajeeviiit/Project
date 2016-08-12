/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package javagame;

import java.awt.*;

import javax.swing.JFrame;
class frame1 extends JFrame
{
	
TextField t;
Label l;
public frame1(){
	
t=new TextField();
l=new Label("Enter the Number");
setLayout(null);
l.setBounds(100,100,50,50);
add(l);	
t=new TextField("Enter the Number");
t.setBounds(200,100,50,50);
add(t);
setSize(400,400);
setLocation(200,200);
setVisible(true);	
		
}
}
public class frame{
public static void main(String args[]){
	
	frame1 obj=new frame1();
        obj.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	
}
}
