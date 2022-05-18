import kivy
from kivy.app import App
from kivy.uix.gridlayout import GridLayout
from kivy.uix.button import Button
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.image import Image
kivy.require('1.10.1')


class BluSol(App):
    def build(self):
        superBox = BoxLayout(orientation="vertical")
        horizontalBox = BoxLayout(orientation="horizontal")
        wimg = Image(
            source='impact-logo.png')
        horizontalBox.add_widget(wimg)
        buttonBox = BoxLayout(orientation="horizontal")
        btn1 = Button(text="hello", size_hint=(.7, 1))
        btn2 = Button(text="world", size_hint=(.3, 1))
        buttonBox.add_widget(btn1)
        buttonBox.add_widget(btn2)
        superBox.add_widget(horizontalBox)
        superBox.add_widget(buttonBox)
        return superBox


if __name__ == '__main__':
    BluSol().run()
