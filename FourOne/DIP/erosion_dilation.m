image = imread('assets/pattern.tif');
timage = graythresh(image);
st = strel('line', 11, 90);
eimg = imerode(timage, st);
figure
imshow(eimg);