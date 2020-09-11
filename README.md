# MediaManager

### Project Brief

You work for Whizzy Software, a software house specialising in serving the needs of clients in the media industry, such as TV and radio companies, 
music streaming services, etc. One of their clients’ needs a stand-alone component that supports the organisation of media files on a device such as a 
desktop computer, laptop, tablet or smartphone. Your manager would like you to design, build, and test an initial version of this component – the “Media Organiser”.

Whizzy Software develops software components for clients in media industries: music, video, radio, TV etc.
* This project, for one of their clients, is to build a component intended to form part of larger systems which will need to be ported to other platforms.
* The component will be used as a fully-functional prototype that the client can use to test requirements with their own customers.
* The component may run on any execution environment of your choice, on a desktop computer or a mobile computing device.
    * The execution environment should support a local filing system that may contain streamable media files (AAC, MP3, WAV, MP4, AVI, etc).
    * The component should launch as a stand-alone application in that environment.
    * The component does not need to access the network.
* The component should be designed and built to production standards.
* You are advised to get a basic version of the component working first, before adding richer features. Examples of richer features could include:
    * A choice of ways to browse the contents of the organiser.
    * The ability to sort Playlists according to various user-specified criteria.
    * Showing thumbnails of images in the user interface.
    * The ability to change the scope and search again during a session.

### Load and save state:
* Save the internal state of the organiser (i.e. the set of MediaFile data, Annotations, Image data and PlayLists) in a text file.
* Load the state of the organiser from a previously saved file.
* You will need to design the format of these files so that your program can save and load them easily. You may consider basing it on XML, JSON or any other format of your choice.

### Specify categories:
* Allow the user to specify a set of Categories which may be associated with MediaFiles.
* The user may add a Category, delete a Category, or rename an existing Category.

### Manage media files:
* The user may select a MediaFile.
* The user may add, edit, or delete a comment about the selected MediaFile.
* The user may add or change an Image related to the selected MediaFile.
* The user may choose or change the Categories associated with the selected MediaFile.

### Make playlists:
* A PlayList refers to a sequence of MediaFiles chosen by the user.
* The user may create and delete PlayLists, change their names, and reorganise their content.
