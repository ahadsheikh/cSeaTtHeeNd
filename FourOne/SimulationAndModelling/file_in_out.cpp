#include <iostream>
#include <fstream>
#include <string>
#include <vector>
using namespace std;

int main(int argc, char** argv){
    ifstream fin;
    ofstream fout;
    string line;
    vector<string> lines;
    fin.open("in.txt");
    if (fin.is_open()){
        cout << "File content is going to console out by getline function." << endl;
        while(getline(fin, line)){
            cout << line << endl;
            lines.push_back(line);
        }
    }    
    putchar('\n');
    fin.close();

    fout.open("out.txt");
    if (fout.is_open()){
        cout << "Input content is going to be writen in out.txt file" << endl;
        for(int i = 0; i < lines.size(); i++){
            fout << lines[i] << endl;
        }
    }
    fout.close();
    return 0;
}